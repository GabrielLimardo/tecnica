<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Http;
use App\Http\Clases\FilterClases;
use Illuminate\Http\Request;

class CockTailController
{   
    protected $link;

    public function __construct()
    {
       $this -> link = 'www.thecocktaildb.com/api/json/v1/1/';
    }

    public function index()
    {
       $result =  Http::get($this -> link.'filter.php?c=Cocktail')->collect();
       return  $result;
    }
    
    public function show($id)
    {
        $result =  Http::get($this -> link.'lookup.php?i='.$id)->collect();
        return  $result;
    }


    public function filter(Request $request)
    {   
        switch ($request->type) {
            case 'name':
                $name =  isset ($request->name)? $request->name : null ;
                $products =  Http::get($this -> link.'search.php?s='.$name)->collect();
                break;
            // case 'ingredient_name':
            //     $ingredient_name =  isset ($request->name)? $request->name : null ;
            //     $products =  Http::get($this -> link.'search.php?i='.$ingredient_name)->collect();
            //     break;
            // default:
            //     $category =  isset ($request->name)? $request->name : null ;
            //     $products =  Http::get($this -> link.'filter.php?c='.$category)->collect();
            //     break;
        }
        return  $products;
    }
}
