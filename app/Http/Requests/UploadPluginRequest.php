<?php

namespace TridentSDK\Http\Requests;

use Illuminate\Validation\Rule;
use TridentSDK\Plugin;
use TridentSDK\Utils\Trident;

class UploadPluginRequest extends Request {

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
            "trident-version" => ["required", Rule::in(array_keys(Trident::$versions))],
            "plugin-version-major" => "required|between:0,9999",
            "plugin-version-minor" => "required|between:0,9999",
            "plugin-version-patch" => "required|between:0,9999",
            "plugin-file" => "required|file|max:15000",
            "changelog" => "required|between:10,1000",
            'g-recaptcha-response' => 'required|captcha'
        ];
    }
}
