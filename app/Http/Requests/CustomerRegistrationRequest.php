<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class CustomerRegistrationRequest extends FormRequest
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
            // 'name'          => ['required', 'string'],
            'email'         => ['required', 'email', 'string', 'unique:customers'],
            // 'phone'         => ['required_without:email', 'numeric', 'min:11'],
            'password'      => ['required', Rules\Password::defaults()],
        ];
    }

    // public function messages(){
    //     return [
    //         'name.required ' => 'Full name required',
    //         'email.email ' => 'Enter a valid email',
    //         'phone.required ' => 'Phone required',
    //         'password.required ' => 'Password required',
    //         'password_confirmation.required ' => 'Confirm Password required',
    //     ];
    // }
}
