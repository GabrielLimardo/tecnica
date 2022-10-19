<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonaListsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'strDrink'=> 'required|max:250',
            'strDrinkThumb'=> 'required|max:250',
            'idDrink'=> 'required|max:50',
            'stars'=> 'required|max:50',
            'note'=> 'required|max:250',
            'difficult'=> 'required|max:50',
        ];
    }
}
