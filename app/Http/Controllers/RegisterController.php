<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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

        //MOdificar el Request
        $request->request->add(['username' => Str::slug($request->get('username'))]);

       // dd($request);//imprimir lo que se escribe adentro del dd
      // dd($request->get('username'));//acceder a cada valor de volma individual para debuger
       //validacion 

       $this->validate($request, [
        //se puede usar tambien esta forma 
        //$validator = Validator::make($request->all(), [
        'name'=>'required|max:30',
        //solicitud de usuaurio pero que sea unico 
        'username'=> "required|unique:users|min:3|max:25",
        'email'=>'required|unique:users|email|max:60',
        'password'=>'required|confirmed|min: 6'

       ]);
       //crear un nuevo registro 
       User::create([
        'name'=>$request-> get('name'),
        'username'=>$request->username,
        'email'=>$request->get ('email'),
        'password'=> Hash::make ($request-> get ('password'))
       ]);

      // \Debugbar::error($this->validate);
        

        //autenticar usuarios

        // auth()->attempt([
        //     'email'=>$request->email,
        //     'password'=>$request->password
        // ]);

        //otra forma de autenticar 
        auth()->attempt($request->only('email','password'));
        //redirteccionar 
        return redirect ()->route('posts.index');

  
    }
}
