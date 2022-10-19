<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Http\Resources\UsersResource;
use App\Http\Requests\StoreUsersRequest;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function index()
    {
        $usuarios = User::latest()->get();
        return UsersResource::collection($usuarios);
    }

    public function store(StoreUsersRequest $request)
    {
        $user =  new User($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['msj'=>'User Created','id'=>$user->id],200);
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['msj'=>$user],200);
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
        return response()->json(['msj'=>'User Delete'],200);
    }
    

}
