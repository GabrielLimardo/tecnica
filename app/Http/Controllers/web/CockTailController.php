<?php

namespace App\Http\Controllers\web;

use Illuminate\Support\Facades\Http;
use App\Http\Clases\FilterClases;
use Illuminate\Http\Request;

class CockTailController
{   

    public function index()
    {
       $results =  Http::get($this -> link.'filter.php?c=Cocktail')->collect()->first();
       return view('cockTails.index',compact('results'));
    }
    
    public function show($id)
    {
        $results =  Http::get($this -> link.'lookup.php?i='.$id)->collect()->first();
        return view('cockTails.view', compact('results'));
    }

    public function filter(Request $request,$type)
    {   
        switch ($type) {
            case 'name':
                $name =  isset ($request->name)? $request->name : null ;
                $result =  Http::get($this -> link.'search.s='.$name)->collect();
                break;
            case 'ingredient_name':
                $ingredient_name =  isset ($request->ingredient_name)? $request->ingredient_name : null ;
                $result =  Http::get($this -> link.'search.i='.$ingredient_name)->collect();
                break;
            default:
                $category =  isset ($request->category)? $request->category : null ;
                $result =  Http::get($this -> link.'filter.php?c='.$category)->collect();
                break;
        }
        return view('cockTails.index',compact('result'));
    }
}
