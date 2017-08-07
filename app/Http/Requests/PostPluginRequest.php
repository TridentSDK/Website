<?php

namespace TridentSDK\Http\Requests;

use Illuminate\Validation\Rule;
use TridentSDK\Plugin;

class PostPluginRequest extends Request {

    protected $errorBag = 'plugin';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            "plugin-name" => "required|between:6,30|unique:plugin,name",
            "plugin-space" => "required",
            "plugin-license" => ["required", Rule::in(array_keys(Plugin::$licenses))],
            "short-description" => "required|between:10,60",
            "full-description" => "required|between:10,1000",
            "primary-category" => ["required", Rule::in(array_keys(Plugin::$categories))],
            "secondary-category.*" => ["required", Rule::in(array_keys(Plugin::$categories))],
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
