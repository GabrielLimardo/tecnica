<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this -> id,
            'name' => $this -> name,
            'email' => $this -> email,
            'contry' => $this -> contry,
            'age' => $this -> age,
        ];
    }
}
