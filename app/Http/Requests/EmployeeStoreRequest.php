<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|unique:employees',
            'phone'=>['required','regex:/^[0-9]{11,20}$/'],
            'company_id'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => "First Name is Required",
            'last_name.required' => "Last Name is Required",
            'email.required' => "Email is Required",
            'phone.required' => "Phone is Required",
            'company_id.required' => "Company is Required",
            'phone.regex' => 'Please enter a valid phone number.',

        ];
    }
}
