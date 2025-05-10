<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class ResetPasswordRequest extends FormRequest
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
            'email' => 'required|email|max:255',
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
