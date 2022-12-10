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

        return redirect()->route('personalists.index')
            ->with('success', 'Personalist deleted successfully');
    }
}
