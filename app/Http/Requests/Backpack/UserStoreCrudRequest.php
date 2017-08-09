<?php

namespace TridentSDK\Http\Requests\Backpack;

use Backpack\CRUD\app\Http\Requests\CrudRequest;

class UserStoreCrudRequest extends CrudRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => 'required|unique:'.config('laravel-permission.table_names.users', 'users').',email',
            'username' => 'required',
            'password' => 'required|confirmed',
        ];
    }
}
