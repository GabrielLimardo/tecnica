<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=> 'required|max:50',
            'email'=> 'required|max:50|unique:users,email',
            'password'=> 'min:6|required_with:retype_password|same:retype_password',
            'retype_password'=> 'min:6',
        ];
    }
}
