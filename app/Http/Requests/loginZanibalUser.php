<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class loginZanibalUser extends Request
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
            'username' => 'required',
            'password'  => 'required',
        ];
    
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => 'Your username is required',
            'password.required' => 'Your password is required'
        ];
    }

        
}
