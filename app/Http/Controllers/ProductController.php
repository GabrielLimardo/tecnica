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
        return view('product.index',compact('products'));

    }

    public function create()
    {
        $product = new Product();
        return view('product.create', compact('product'));
    }

    public function store(Request $request)
    {
        request()->validate(Product::$rules);

        $product = Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product =  Http::get($this -> link.'lookup.php?i='.$id)->collect()->first();
        $product = isset($product[0]) ?  $product[0] : null ; 
        return view('product.show', compact('product'));
    }

    public function filter(Request $request)
    {   
      
        switch ($request->type) {
            case 'name':
                    $name =  isset ($request->name)? $request->name : null ;
                    $products =  Http::get($this -> link.'search.php?s='.$name)->collect()->first();
                    break;
        }
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        request()->validate(Product::$rules);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
