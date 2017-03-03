<?php

namespace TridentSDK\Http\Requests;

use TridentSDK\Http\Requests\Request;

class RegisterUserRequest extends Request {

    protected $errorBag = 'register';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return !\Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            "username" => "required|between:6,30|unique:user",
            "email"    => "required|email|unique:user",
            "password" => "required|confirmed|same:password_confirmation",
	        'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
