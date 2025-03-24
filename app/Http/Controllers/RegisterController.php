<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
       $this->validate($request,[
        'name'=>'required| max:30'
       ]);
        
    }
}
