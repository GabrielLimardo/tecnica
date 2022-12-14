<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaList extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'list';
    
    protected $primaryKey= 'id';

    protected $fillable = [
        'id',
        'id_user',
        'strDrink',
        'strDrinkThumb',
        'idDrink',
        'stars', 
        'note',
        'difficult'
    ];



      
}
