<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    protected $link;

    public function __construct()
    {
       $this -> link = 'www.thecocktaildb.com/api/json/v1/1/';
    }

    public function index()
    {
        $products =  Http::get($this -> link.'filter.php?c=Cocktail')->collect()->first();

        return view('product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Http::get($this -> link.'lookup.php?i='.$id)->collect()->first();
        return view('product.show', compact('product'));
    }

    public function filter(Request $request,$type)
    {   
        switch ($type) {
            case 'name':
                $name =  isset ($request->name)? $request->name : null ;
                $product =  Http::get($this -> link.'search.s='.$name)->collect();
                break;
            case 'ingredient_name':
                $ingredient_name =  isset ($request->ingredient_name)? $request->ingredient_name : null ;
                $product =  Http::get($this -> link.'search.i='.$ingredient_name)->collect();
                break;
            default:
                $category =  isset ($request->category)? $request->category : null ;
                $product =  Http::get($this -> link.'filter.php?c='.$category)->collect();
                break;
        }
        return view('product.index',compact('product'));
    }
}
