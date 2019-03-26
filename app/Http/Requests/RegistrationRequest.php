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
            'childs' => 'nullable|array|min:1',
            'childs.*.firstname' => 'nullable|string|min:3|max:255',
            'childs.*.lastname' => 'nullable|string|min:3|max:255',
            'childs.*.DOB' => 'nullable|string',
            'street_address' => 'required|min:3|max:255',
            'town' => 'required|min:2|max:255',
            'zip' => 'required|regex:/[0-9]{5,}/',
            'mother_first_name' => 'required|min:3|max:255',
            'mother_last_name' => 'required|min:3|max:255',
            'home_phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
            'mother_cell_phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
            'mother_employer' => 'required|min:3|max:255',
            'mother_city' => 'required|min:2|max:255',
            'mother_state' => 'required|min:2|max:255',
            'mother_work_phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
            'father_first_name' => 'required|min:3|max:255',
            'father_last_name' => 'required|min:3|max:255',
            'father_cell_phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
            'father_employer' => 'required|min:3|max:255',
            'father_city' => 'required|min:2|max:255',
            'father_state' => 'required|min:2|max:255',
            'father_work_phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
            'primary_email_address' => 'required|max:255',
            'allergies' => 'required|boolean',
            'allergies_describe' => 'required_if:allergies,1|max:65535',
            'medical_history' => 'required|boolean',
            'medical_history_describe' => 'required_if:medical_history,1|max:65535',
            'epi_pen' => 'required|boolean',
            'release_form' => 'required|boolean',
            'photo_choice' => 'required',
            'directory' => 'required|boolean',
            'your_name' => 'required|min:3|max:255',
            'date' => 'required',
            'signature' => 'required',

            'contact' => 'required|array|min:2',
            'contact.*.name' => 'required|string|min:3|max:255',
            'contact.*.phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
            'contact.*.address' => 'required|string|min:3|max:255',
            'contact.*.relation' => 'required|max:65535',

            'physician' => 'required|array|min:1',
            'physician.*.name' => 'required|string|min:3|max:255',
            'physician.*.phone' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',

            'additional' => 'nullable|array|min:2',
            'additional.*.name' => 'nullable|string|min:3|max:255',
            'additional.*.phone' => 'nullable|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
            'additional.*.relation' => 'nullable|max:65535',

            'g-recaptcha-response' => 'required|captcha'
        ];
    }
}
