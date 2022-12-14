<?php

namespace App\Http\Controllers;

use App\Models\Personalist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
/**
 * Class PersonalistController
 * @package App\Http\Controllers
 */
class PersonalistController extends Controller
{

    protected $link;

    public function __construct()
    {
       $this -> link = 'www.thecocktaildb.com/api/json/v1/1/';
    }

    public function index()
    {
        $personalists = Personalist::where('id_user',Auth::user()->id)->get();

        return view('personalist.index', compact('personalists'));

    }
    public function edit($id)
    {
        $personalist = Personalist::find($id);

        return view('personalist.edit', compact('personalist'));
    }
    public function update(Request $request, Personalist $Personalist)
    {
        $Personalist= Personalist::where( 'idDrink', $request-> idDrink )->first();
        $Personalist-> idDrink = $request-> idDrink; 
        $Personalist-> strDrink = $request-> strDrink; 
        $Personalist-> strDrinkThumb = $request-> strDrinkThumb; 
        $Personalist-> stars = $request-> stars; 
        $Personalist-> note = $request-> note; 
        $Personalist-> difficult = $request-> difficult; 
        $Personalist->save();

        return redirect()->route('list.index')
            ->with('success', 'Product updated successfully');
    }
    public function add($id)
    {
        $result =  Http::get($this -> link.'lookup.php?i='.$id)->collect()->first()[0];
        $Personalist = Personalist::create([
            'id_user' => Auth::user()->id,
            'idDrink' => $result ['idDrink'],
            'strDrink' => $result ['strDrink'],
            'strDrinkThumb' => $result ['strDrinkThumb'],
            'stars' => null,
            'note' => null,
            'difficult' => null,
        ]);

        $personalists = Personalist::where('id_user',Auth::user()->id)->get();
        return view('personalist.index', compact('personalists'));

    }

   
    public function destroy($id)
    {
        $personalist = Personalist::find($id)->delete();

        return redirect()->route('list.index')
            ->with('success', 'Personalist deleted successfully');
    }
}
