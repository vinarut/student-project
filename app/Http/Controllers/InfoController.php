<?php

namespace App\Http\Controllers;

use App\AdditionalIndividuals;
use App\ContactList;
use App\Http\Requests\RegistrationRequest;
use App\Info;
use App\Physicians;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use League\Csv\Writer;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic', ['only' => ['index', 'export']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchLinks = [];
        $query = Info::orderBy('id', 'desc');
        /*
        if($fromDate = request()->get('from_date')) {
            $query->whereDate('created_at', '>=', Carbon::createFromFormat(config('settings.dateFormat'), $fromDate)->toDateString());
            array_push($searchLinks, 'started_at');
        }
        if($toDate = request()->get('to_date')) {
            $query->whereDate('created_at', '<=', Carbon::createFromFormat(config('settings.dateFormat'), $toDate)->toDateString());
            array_push($searchLinks, 'to_date');
        }
        if($promoCode = request()->get('promo_code')) {
            $query->where('promo_code', $promoCode);
            array_push($searchLinks, 'promo_code');
        }
        */
        $clients = $query->paginate(20);

        /// * apply search params to pagination links
        if(count($searchLinks)) {
            $clients->appends(\Input::only($searchLinks));
        }

        return view('info.index', ['clients'=>$clients]);
    }

    /**
     *
     */
    public function export()
    {
        $header = [];

        $pdo = \DB::connection()->getPdo();

        $sql = "show columns from `info`";
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch()) {
            $header[] = ucwords(str_replace("_", " ", $row['Field']));
        }

        $filters = [];
        $vars = [];
        if($fromDate = request()->get('from_date')) {
            $filters[] = "`created_at` >= :from_date";
            $vars['from_date'] = Carbon::createFromFormat(config('settings.dateFormat'), $fromDate)
                ->startOfDay()->toDateTimeString();
        }
        if($toDate = request()->get('to_date')) {
            $filters[] = "`created_at` <= :to_date";
            $vars['to_date'] = Carbon::createFromFormat(config('settings.dateFormat'), $toDate)
                ->endOfDay()->toDateTimeString();
        }

        $sql = "select * from `info`".
            (count($filters)? " where ".implode(" and ", $filters): "").
            " order by `id` desc";

        $stmt = $pdo->prepare($sql);
        foreach($vars as $k => $v) {
            $stmt->bindValue(":".$k, $v, \PDO::PARAM_STR);
        }
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $stmt->execute();
        $csv = Writer::createFromPath('php://temp', 'r+');
        $csv->insertOne($header);
        $csv->insertAll($stmt);

        //we create a callable to output the CSV in chunk
        //with Symfony StreamResponse you can flush the body content if necessary
        //see Symfony documentation for more information
        $flush_threshold = 1000; //the flush value should depend on your CSV size.
        $content_callback = function () use ($csv, $flush_threshold) {
            foreach ($csv->chunk(1024) as $offset => $chunk) {
                echo $chunk;
                if ($offset % $flush_threshold === 0) {
                    flush();
                }
            }
        };

        //We send the CSV using Symfony StreamedResponse
        $response = new StreamedResponse();
        $response->headers->set('Content-Encoding', 'none');
        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');

        $disposition = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'info.csv'
        );

        $response->headers->set('Content-Disposition', $disposition);
        $response->headers->set('Content-Description', 'File Transfer');
        $response->setCallback($content_callback);
        $response->send();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RegistrationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationRequest $request)
    {
        \DB::transaction(function () use ($request) {

            $validated = $request->validated();

            $info = new Info([
                'childs_name' => $validated['child_name'] ?? '',
                'DOB' => $validated['DOB'] ?? '',
                'street_address' => $validated['street_address'] ?? '',
                'town' => $validated['town'] ?? '',
                'zip' => $validated['zip'] ?? '',
                'mothers_name' => $validated['mother_name'] ?? '',
                'home_phone' => $validated['home_phone'] ?? '',
                'mothers_cell_phone' => $validated['mother_cell_phone'] ?? '',
                'mothers_employer' => $validated['mother_employer'] ?? '',
                'mothers_city' => $validated['mother_city'] ?? '',
                'mothers_state' => $validated['mother_state'] ?? '',
                'mothers_work_phone' => $validated['mother_work_phone'] ?? '',
                'fathers_name' => $validated['father_name'] ?? '',
                'fathers_cell_phone' => $validated['father_cell_phone'] ?? '',
                'fathers_employer' => $validated['father_employer'] ?? '',
                'fathers_city' => $validated['father_city'] ?? '',
                'fathers_state' => $validated['father_state'] ?? '',
                'fathers_work_phone' => $validated['father_work_phone'] ?? '',
                'primary_email_address' => $validated['primary_email_address'] ?? '',
                'allergies' => $validated['allergies'] ?? '',
                'allergies_describe' => $validated['allergies_describe'] ?? '',
                'special_medical_history' => $validated['medical_history'] ?? '',
                'special_medical_history_describe' => $validated['medical_history_describe'] ?? '',
                'epi_pen' => $validated['epi_pen'] ?? '',
            ]);
            $info->save();

            $physicians = $validated['physician'];
            $contacts = $validated['contact'];
            $additions = $validated['additional'];

            $mappedPhysicians = collect($physicians)->mapInto(Physicians::class);
            $mappedContacts = collect($contacts)->mapInto(ContactList::class);
            $mappedAdditions = collect($additions)->mapInto(AdditionalIndividuals::class);

            $info->physicians()->saveMany($mappedPhysicians);
            $info->contactList()->saveMany($mappedContacts);
            $info->additionalIndividuals()->saveMany($mappedAdditions);
        });

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $info)
    {
        //
    }
}
