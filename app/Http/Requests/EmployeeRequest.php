<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'gender' => 'required',
            'civil_status' => 'required',
            'dob' => 'required|date_format:Y-m-d',
            'address_1' => 'required',
            'nic' => 'required|max:12|min:9',
            'passport_photo' => 'required|image',
            'mobile_no' => 'required|numeric',
            'email' => 'required|email:rfc,dns',
            'designation_id' => 'required',
            'district_id' => 'required',
            'division_id' => 'required',
            'gn_division' => 'required|max:50',
            'gov_f_photo' => 'required|image',
            'gov_b_photo' => 'required|image',
        ];
    }
}
