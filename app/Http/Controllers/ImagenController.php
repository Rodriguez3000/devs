<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
        $imagen= $request->file('file');
        
       
        //return response ()->json($input);
        $request->hasFile('dropzone');
        $imagen=$request->file('file');
        
        // //genera un uuid unico para la imagen
        $nombreImagen= Str::uuid(). ".".$imagen->extension();
        
        //intervetion image
        $imagenServidor= Image::read($imagen)
        // $imagenServidor->fit(1000,1000);
            ->resize(1000, 1000);

        $imagenPath= public_path('uploads').'/'.$nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen'=>$nombreImagen]);
        // //---------------------

    }
}

