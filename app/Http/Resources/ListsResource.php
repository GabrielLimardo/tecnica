<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this -> id,
            'strDrink' => $this -> strDrink,
            'strDrinkThumb' => $this -> strDrinkThumb,
            'idDrink' => $this -> idDrink,
            'stars' => $this -> stars,
            'note' => $this -> note,
            'difficult' => $this -> difficult,
        ];
    }
}
