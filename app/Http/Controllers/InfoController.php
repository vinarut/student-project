<?php

namespace App\Http\Controllers;

use App\AdditionalIndividuals;
use App\ContactList;
use App\EmailList;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\UserRequest;
use App\Info;
use App\Physicians;
use App\Token;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use League\Csv\Writer;
use function Sodium\add;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InfoController extends Controller
{
    /**
     * InfoController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth.basic',
            ['only' => ['index', 'export', 'show', 'admin', 'register', 'getSubscribers', 'getEmailList' , 'addEmail',
                        'removeEmail', 'getFormAddUser', 'addUser', 'users', 'removeUser']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Info::orderBy('id', 'desc');
        $clients = $query->paginate(20);

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
            if (stripos($row['Field'], 'signature') !== false)
                continue;
            $header[] = $row['Field'];
        }

        $collContacts = $collPhysicians = $collIndividuals = collect();

        $sql = "select count(*) as `cnt` from `contact_list` group by `info_id` order by `cnt` desc limit 1";
        $maxContacts = 2;
        $row = $pdo->query($sql)->fetch(\PDO::FETCH_ASSOC);
        if (isset($row['cnt']) && $row['cnt'] > $maxContacts) {
            $maxContacts = $row['cnt'];
        }
        $collContacts = $collContacts->pad($maxContacts, ['first_name', 'last_name', 'phone', 'address'])->map(function ($item, $key) {
            array_walk($item, function (& $i) use ($key) {
                $i = 'contact_'.$i.'_'.($key + 1);
            });
            return $item;
        });
        $collContacts->each(function ($item, $key) use (& $header) {
            $header = array_merge($header, $item);
        });

        $sql = "select count(*) as `cnt` from `physicians` group by `info_id` order by `cnt` desc limit 1";
        $maxPhysicians = 1;
        $row = $pdo->query($sql)->fetch(\PDO::FETCH_ASSOC);
        if (isset($row['cnt']) && $row['cnt'] > $maxPhysicians) {
            $maxPhysicians = $row['cnt'];
        }
        $collPhysicians = $collPhysicians->pad($maxPhysicians, ['name', 'phone'])->map(function ($item, $key) {
            array_walk($item, function (& $i) use ($key) {
                $i = 'physician_'.$i.'_'.($key + 1);
            });
            return $item;
        });
        $collPhysicians->each(function ($item, $key) use (& $header) {
            $header = array_merge($header, $item);
        });

        $sql = "select count(*) as `cnt` from `additional_individuals` group by `info_id` order by `cnt` desc limit 1";
        $maxIndividuals = 2;
        $row = $pdo->query($sql)->fetch(\PDO::FETCH_ASSOC);
        if (isset($row['cnt']) && $row['cnt'] > $maxIndividuals) {
            $maxIndividuals = $row['cnt'];
        }
        $collIndividuals = $collIndividuals->pad($maxIndividuals, ['name', 'phone'])->map(function ($item, $key) {
            array_walk($item, function (& $i) use ($key) {
                $i = 'additional_individuals_'.$i.'_'.($key + 1);
            });
            return $item;
        });
        $collIndividuals->each(function ($item, $key) use (& $header) {
            $header = array_merge($header, $item);
        });

        array_walk($header, function (& $item) {
            $item = ucwords(str_replace("_", " ", $item));
        });

        $filters = [];
        $vars = [];

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

        while ($row = $stmt->fetch()) {
            unset($row['signature']);
            $row['photo_choice'] = preg_replace('/\r\n|\r|\n/u', ' ', $row['photo_choice']);
            $row['photo_choice'] = preg_replace('| +|', ' ', $row['photo_choice']);
            $i = 0;
            $sql = "select `first_name`, `last_name`, `phone`, `address` from `contact_list` where `info_id`=:info_id";
            $stmt1 = $pdo->prepare($sql);
            $stmt1->bindValue(":info_id", $row['id'], \PDO::PARAM_INT);
            $stmt1->execute();
            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                $row = array_merge($row, array_combine($collContacts->get($i), $row1));
                $i ++;
            }
            while($i < $maxContacts) {
                $row = array_merge($row, array_combine($collContacts->get($i), ['','','']));
                $i ++;
            }
            $stmt1->closeCursor();

            $i = 0;
            $sql = "select `name`, `phone` from `physicians` where `info_id`=:info_id";
            $stmt1 = $pdo->prepare($sql);
            $stmt1->bindValue(":info_id", $row['id'], \PDO::PARAM_INT);
            $stmt1->execute();
            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                $row = array_merge($row, array_combine($collPhysicians->get($i), $row1));
                $i ++;
            }
            while ($i < $maxPhysicians) {
                $row = array_merge($row, array_combine($collPhysicians->get($i), ['','']));
                $i ++;
            }
            $stmt1->closeCursor();

            $i = 0;
            $sql = "select `name`, `phone` from `additional_individuals` where `info_id`=:info_id";
            $stmt1 = $pdo->prepare($sql);
            $stmt1->bindValue(":info_id", $row['id'], \PDO::PARAM_INT);
            $stmt1->execute();
            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                $row = array_merge($row, array_combine($collIndividuals->get($i), $row1));
                $i ++;
            }
            while ($i < $maxIndividuals) {
                $row = array_merge($row, array_combine($collIndividuals->get($i), ['', '']));
                $i ++;
            }
            $stmt1->closeCursor();

            $csv->insertOne($row);
        }

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
        return view('form', ['token' => ltrim($_SERVER['REQUEST_URI'], '/register/')]);
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

            $childs = $validated['childs'];
            $physicians = $validated['physician'];
            $contacts = $validated['contact'];
            $additions = $validated['additional'];

            $childs = array_filter($childs, function ($child) use ($childs) {
                return isset($child['firstname'], $child['lastname'], $child['DOB']);
            });

            $additions = array_filter($additions, function ($addition) use ($additions) {
                return isset($addition['name'], $addition['phone'], $addition['relation']);
            });

            foreach ($childs as $child)
            {
                $info = new Info([
                    'childs_first_name' => $child['firstname'] ?? '',
                    'childs_last_name' => $child['lastname'] ?? '',
                    'DOB' => $child['DOB'] ?? '',
                    'street_address' => $validated['street_address'] ?? '',
                    'town' => $validated['town'] ?? '',
                    'zip' => $validated['zip'] ?? '',
                    'mothers_first_name' => $validated['mother_first_name'] ?? '',
                    'mothers_last_name' => $validated['mother_last_name'] ?? '',
                    'home_phone' => $validated['home_phone'] ?? '',
                    'mothers_cell_phone' => $validated['mother_cell_phone'] ?? '',
                    'mothers_employer' => $validated['mother_employer'] ?? '',
                    'mothers_city' => $validated['mother_city'] ?? '',
                    'mothers_state' => $validated['mother_state'] ?? '',
                    'mothers_work_phone' => $validated['mother_work_phone'] ?? '',
                    'fathers_first_name' => $validated['father_first_name'] ?? '',
                    'fathers_last_name' => $validated['father_last_name'] ?? '',
                    'fathers_cell_phone' => $validated['father_cell_phone'] ?? '',
                    'fathers_employer' => $validated['father_employer'] ?? '',
                    'fathers_city' => $validated['father_city'] ?? '',
                    'fathers_state' => $validated['father_state'] ?? '',
                    'fathers_work_phone' => $validated['father_work_phone'] ?? '',
                    'primary_email_address' => $validated['primary_email_address'] ?? '',
                    'allergies' => ($validated['allergies']) ? 'yes' : 'no',
                    'allergies_describe' => ($validated['allergies']) ? $validated['allergies_describe'] : '',
                    'special_medical_history' => ($validated['medical_history']) ? 'yes' : 'no',
                    'special_medical_history_describe' => ($validated['medical_history']) ?
                        $validated['medical_history_describe'] : '',
                    'epi_pen' => ($validated['epi_pen']) ? 'yes' : 'no',
                    'release_form' => ($validated['release_form']) ? 'yes' : 'no',
                    'photo_choice' => $validated['photo_choice'] ?? '',
                    'directory_agree' => ($validated['directory']) ? 'yes' : 'no',
                    'your_name' => $validated['your_name'] ?? '',
                    'date' => $validated['date'] ?? '',
                    'signature' => $validated['signature'] ?? '',
                    'ip' => $_SERVER['REMOTE_ADDR'],
                ]);
                $info->save();

                $mappedPhysicians = collect($physicians)->mapInto(Physicians::class);
                $mappedContacts = collect($contacts)->mapInto(ContactList::class);

                $info->physicians()->saveMany($mappedPhysicians);
                $info->contactList()->saveMany($mappedContacts);

                if (count($additions))
                {
                    $mappedAdditions = collect($additions)->mapInto(AdditionalIndividuals::class);
                    $info->additionalIndividuals()->saveMany($mappedAdditions);
                }
            }

            flash()->success('Your Student information has been submitted – Thank you');
        });

        return back()->withInput();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function admin()
    {
        return view('auth.admin');
    }

    /**
     * @param AdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(AdminRequest $request)
    {
        $validated = $request->validated();

        $token = new Token([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'token' => $validated['token'],
        ]);
        $token->save();

        flash()->success('Record created successfully');

        return back()->withInput();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSubscribers()
    {
        return view('info.subscribers', ['subscribers' => Token::all()]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEmailList()
    {
        return view('info.emailList', ['emails' => EmailList::all()]);
    }

    /**
     * @param EmailRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addEmail(EmailRequest $request)
    {
        $validated = $request->validated();

        $email = new EmailList([
            'email' => $validated['email']
        ]);
        $email->save();

        return back()->withInput();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeEmail()
    {
        \DB::table('email_lists')->where('email', '=', $_POST['email'])->delete();

        return back()->withInput();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFormAddUser()
    {
        return view('auth.register');
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addUser(UserRequest $request)
    {
        $validated = $request->validated();

        $user = new User([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        $user->save();

        return redirect(route('admin.users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function users()
    {
        return view('info.userList', ['users' => User::all()]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeUser()
    {
        \DB::table('users')->where('email', '=', $_POST['email'])->delete();

        return back()->withInput();
    }

    /**
     * @param $info
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($info)
    {
        $info = Info::with(['physicians', 'contactList', 'additionalIndividuals'])->findOrFail($info);

        return view('info.show', ['info' => $info]);
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
