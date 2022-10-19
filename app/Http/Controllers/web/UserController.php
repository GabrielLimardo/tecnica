<?php

namespace App\Http\Controllers\web;

use App\Models\User;
use App\Http\Resources\UsersResource;
use App\Http\Requests\StoreUsersRequest;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function index()
    {
        $usuarios = User::latest()->get();
        $users = UsersResource::collection($usuarios);
        return view('users.index',compact('users'));
    }
    public function create()
    {
        $usuarios = User::all();

        return view('users.create')->with('mensaje', 'Usuario creado con exito');
    }
    public function store(StoreUsersRequest $request)
    {
        $user =  new User($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['msj'=>'User Created'],200);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.view', compact('user'));
    }
    public function edit($id)
    {

        $user=User::findOrFail($id);

        return view('users.edit', compact('user'));
    }
    public function update(StoreUsersRequest $request ,$id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return response()->json(['msj'=>'User Update'],200);
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('User Delete', 'Ok');
    }
    

}
