<?php

namespace App\Http\Controllers;

use App\AdditionalIndividuals;
use App\ContactList;
use App\Http\Requests\RegistrationRequest;
use App\Info;
use App\Physicians;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

            $sql = 'SELECT `id` FROM `info` ORDER BY `id` DESC LIMIT 1';
            $id = \DB::select($sql)[0]->id;

            $physician = new Physicians([
                'name' => $validated['physician_name'] ?? '',
                'phone' => $validated['physician_phone'] ?? ''
            ]);
            $physician->save();

            $contactList = new ContactList([
                'child_id' => $id ?? '',
                'name' => $validated['first_contact_name'] ?? '',
                'phone' => $validated['first_contact_phone'] ?? '',
                'address' => $validated['first_contact_address'] ?? '',
            ]);
            $contactList->save();

            $additionalIndividuals = new AdditionalIndividuals([
                'child_id' => $id ?? '',
                'name' => $validated['first_additional_name'] ?? '',
                'phone' => $validated['first_additional_phone'] ?? '',
            ]);
            $additionalIndividuals->save();
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
