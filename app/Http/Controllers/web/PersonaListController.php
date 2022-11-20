<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Models\PersonaList;
use App\Http\Resources\ListsResource;
use App\Http\Requests\StorePersonaListsRequest;

class PersonaListController
{
    public function index()
    {
        $PersonaList = PersonaList::latest()->get();
        $results = ListsResource::collection($PersonaList);
        return view('personalList.index',compact('results'));
    }
    public function create()
    {
        $usuarios = PersonaList::all();

        return view('personalList.create')->with('mensaje', 'Lista agregada con exito');
    }
    public function store(StorePersonaListsRequest $request)
    {
        $PersonaList =  new PersonaList($request->all());
        $PersonaList ->save();
        return response()->json(['msj'=>'PersonaList Created'],200);
    }

    public function show($id)
    {
        $results = PersonaList::find($id);
        return view('personalList.view', compact('results'));
    }
    public function edit($id)
    {
        $results=PersonaList::findOrFail($id);
        return view('personalList.edit', compact('results'));
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
        return redirect()->route('personalList.index')->with('List Delete', 'Ok');    }

}
