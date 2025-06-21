<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class MemberRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Return true if the user can make the request (you can implement custom logic here)
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
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|confirmed'
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [

        'email.required' => 'The email address is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.max' => 'The email must not exceed 255 characters.',
        'password.required' => 'Please enter a required password.',
        'password.min' => 'The password must be at least 8 characters.',
        'password.confirmed' => 'The password entered does not match.',

        ];
    }

    /**
     * Get the data to be used for validation.
     *
     * @return array
     */
    public function validationData()
    {
        return $this->all();
    }
}
