<?php

namespace TridentSDK\Http\Requests\Backpack;

use Backpack\CRUD\app\Http\Requests\CrudRequest;

class UserUpdateCrudRequest extends CrudRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => 'required',
            'username' => 'required',
            'password' => 'confirmed',
        ];
    }
}
