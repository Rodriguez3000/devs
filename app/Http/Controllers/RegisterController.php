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
       // dd($request);//imprimir lo que se escribe adentro del dd
      // dd($request->get('username'));//acceder a cada valor de volma individual para debuger
       //validacion 

    //    $this->validate($request, [
    //     'name'=>'required|max:30',
    //     //solicitud de usuaurio pero que sea unico 
    //     'username'=> 'required|unique:users|min:3|max:25',
    //     'email'=>'required|unique:users:email|max:60',
    //     'password'=>'required|confirmed|min: 6'

    //    ]);
       //crear un nuevo registro 
    //    User::create([
    //     'name'=>$request-> get('name'),
    //     'username'=>Str::lower ($request->get('username')),
    //     'email'=>$request->get ('email'),
    //     'password'=> Hash::make ($request-> get ('password'))
    //    ]);

      // \Debugbar::error($this->validate);

      /// valida datos del formulario
      $validator = Validator::make($request->all(), [
        'name'  => 'required|regex:/^[\pL\s\-]+$/u',
        //solicitud de usuaurio pero que sea unico 
        'username'=> 'required|unique:users|min:3|max:25',
        'email'=>'required|unique:users:email|max:60|email',
        'password'=>'required|confirmed|min: 6'


        
        // |unique:eventos.cupones_mica,folio
    ]);
    /// encuentra error en campos
    if ($validator->fails()) {
        
        $errors  = $validator->errors();
        dd ($errors);
    }else
    {
     //crear un nuevo registro 
       User::create([
        'name'=>$request-> get('name'),
        'username'=>Str::lower ($request->get('username')),
        'email'=>$request->get ('email'),
        'password'=> Hash::make ($request-> get ('password'))
       ]);
    }
      
    }
}
