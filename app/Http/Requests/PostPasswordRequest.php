<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class PostPasswordRequest extends FormRequest
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
