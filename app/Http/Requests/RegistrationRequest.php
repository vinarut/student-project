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
            'child_name' => 'required|min:3|max:255',
            'DOB' => 'required',
            'street_address' => 'required|min:3|max:255',
            'town' => 'required|min:2|max:255',
            'zip' => 'required|regex:/[0-9]{5}/',
            'mother_name' => 'required|min:3|max:255',
            'home_phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
            'mother_cell_phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
            'mother_employer' => 'required|min:3|max:255',
            'mother_city' => 'required|min:2|max:255',
            'mother_state' => 'required|min:2|max:255',
            'mother_work_phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
            'father_name' => 'required|min:3|max:255',
            'father_cell_phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
            'father_employer' => 'required|min:3|max:255',
            'father_city' => 'required|min:2|max:255',
            'father_state' => 'required|min:2|max:255',
            'father_work_phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
            'primary_email_address' => 'required|min:3|max:255',
            'allergies' => 'required|boolean',
            'allergies_describe' => 'required_if:allergies,1|max:65535',
            'medical_history' => 'required|boolean',
            'medical_history_describe' => 'required_if:medical_history,1|max:65535',
            'epi_pen' => 'required|boolean',
            'directory' => 'required|boolean',

            'contact' => 'required|array|min:2',
            'contact.*.name' => 'required|string|min:3|max:255',
            'contact.*.phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
            'contact.*.address' => 'required|string|min:3|max:255',
            'contact.*.relation' => 'required|max:65535',

            'physician' => 'required|array|min:1',
            'physician.*.name' => 'required|string|min:3|max:255',
            'physician.*.phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',

            'additional' => 'required|array|min:2',
            'additional.*.name' => 'required|string|min:3|max:255',
            'additional.*.phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
            'additional.*.relation' => 'required|max:65535',

            'g-recaptcha-response' => 'required|captcha'
        ];
    }
}
