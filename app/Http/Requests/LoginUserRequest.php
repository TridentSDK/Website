<?php

namespace TridentSDK\Http\Requests;

use TridentSDK\Http\Requests\Request;

class LoginUserRequest extends Request {

    protected $errorBag = 'login';

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
            "username" => "required|between:6,30|exists:user",
            "password" => "required"
        ];
    }
}
