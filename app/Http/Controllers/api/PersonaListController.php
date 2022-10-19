<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\PersonaList;
use App\Http\Resources\ListsResource;
use App\Http\Requests\StorePersonaListsRequest;

class PersonaListController
{
    public function index()
    {
        $PersonaList = PersonaList::latest()->get();
        $PersonalList = ListsResource::collection($PersonaList);
        return view('list.index',compact('PersonalList'));
    }
    public function create()
    {
        $usuarios = PersonaList::all();

        return view('list.create')->with('mensaje', 'Lista agregada con exito');
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
        return view('list.view', compact('PersonaList'));
    }
    public function edit($id)
    {
        $PersonaList=PersonaList::findOrFail($id);
        return view('list.edit', compact('PersonaList'));
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
        return redirect()->route('list.index')->with('List Delete', 'Ok');    }

}
