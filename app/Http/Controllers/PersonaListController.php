<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonaList;
use App\Http\Resources\ListsResource;
use App\Http\Requests\StorePersonaListsRequest;

class PersonaListController extends Controller
{
    public function index()
    {
        $PersonaList = PersonaList::latest()->get();
        return ListsResource::collection($PersonaList);
    }

    public function store(StorePersonaListsRequest $request)
    {
        $PersonaList =  new PersonaList($request->all());
        $PersonaList ->save();
        return response()->json(['msj'=>'PersonaList Created'],200);
    }

    public function show($id)
    {
        $PersonaList = PersonaList::find($id);
        return response()->json(['msj'=>$PersonaList],200);
    }
    public function update(StorePersonaListsRequest $request ,$id)
    {
        $PersonaList = PersonaList::find($id);
        $PersonaList->update($request->all());
        return response()->json(['msj'=>'PersonaList Update'],200);
    }
    public function destroy($id)
    {
        $PersonaList = PersonaList::find($id);
        $PersonaList->delete();
        return response()->json(['msj'=>'PersonaList Delete'],200);
    }

}
