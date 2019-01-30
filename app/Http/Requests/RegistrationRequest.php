<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'child_name' => 'required|max:255',
            'DOB' => 'required',
            'street_address' => 'required|max:255',
            'town' => 'required|max:255',
            'zip' => 'required|max:255',
            'mother_name' => 'required|max:255',
            'home_phone' => 'required|max:255',
            'mother_cell_phone' => 'required|max:255',
            'mother_employer' => 'required|max:255',
            'mother_city' => 'required|max:255',
            'mother_state' => 'required|max:255',
            'mother_work_phone' => 'required|max:255',
            'father_name' => 'required|max:255',
            'father_cell_phone' => 'required|max:255',
            'father_employer' => 'required|max:255',
            'father_city' => 'required|max:255',
            'father_state' => 'required|max:255',
            'father_work_phone' => 'required|max:255',
            'primary_email_address' => 'required|max:255',
            'allergies' => 'required|boolean',
            'allergies_describe' => 'required_if:allergies,1',
            'medical_history' => 'required|boolean',
            'medical_history_describe' => 'required_if:medical_history,1',
            'epi_pen' => 'required|boolean',

            'first_contact_name' => 'required|max:255',
            'first_contact_phone' => 'required|max:255',
            'first_contact_address' => 'required|max:255',
            'second_contact_name' => 'required|max:255',
            'second_contact_phone' => 'required|max:255',
            'second_contact_address' => 'required|max:255',

            'physician_name' => 'required|max:255',
            'physician_phone' => 'required|max:255',

            'first_additional_name' => 'required|max:255',
            'first_additional_phone' => 'required|max:255',
            'second_additional_name' => 'required|max:255',
            'second_additional_phone' => 'required|max:255',
        ];
    }
}
