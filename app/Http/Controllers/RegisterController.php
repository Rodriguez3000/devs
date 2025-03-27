<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RegisterController;

class RegisterController extends Controller
{
    //
    public function index  () 
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
       // dd($request);//imprimir lo que se escribe adentro del dd
       //dd($request->get('username'));//acceder a cada valor de volma individual para debuger
       //validacion 

       $this->validate($request, [
        'name'=>'required|max:30',
        //solicitud de usuaurio pero que sea unico 
        'username'=> 'required|unique:users|min:3|max:25',
        'email'=>'required|unique:users:email|max:60',
        'password'=>'required|confirmed|min: 6'

       ]);
       
       User::create([
        'name'=>$request->name,
        'username'=>$request->username,
        'email'=>$request->email,
        'password'=>$request->password
       ]);
       

    }
}
