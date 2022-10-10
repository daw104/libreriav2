<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller{
    //
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'c_password' => 'required|same:password',
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        }
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        return response()->json(['message'=>'User Created','data'=>$user],200);
    }

    public function show(User $user)
    {
        return response()->json(['message'=>'','data'=>$user],200);
    }


    public function show_seller(User $user){
        return response()->json(['message'=>'','data'=>$user->seller],200);
    }

    //listamos ordenes asociadas a un usario
    public function listOrdersUser(User $user){
        $orders = $user->order;
        return response()->json(['message'=>"Estas son las ordenes del usuario:",'data'=>$orders],200);
        //return "entra";
    }



}
