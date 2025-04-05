<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(User $user)
    {
        $posts=Post::where('user_id',$user->id)->get();
   

        return view ('dashboard',[
            'user'=>$user,
            'posts'=>$posts
        ]);
    }
    public function create()
    {
        return view('posts.create');
    }

    //el request se guarda en la base de datos 
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo'=>'required|max:200',
            'descripcion'=>'required',
            'imagen'=>'required'
        ]);
        //crear registros en la base de datos
        // Post::create([
        //     'titulo'=>$request->titulo,
        //     'descripcion'=>$request->descripcion,
        //     'imagen'=>$request->imagen,
        //     'user_id'=> auth()->user()->id
            
        // ]);

        //otra forma de registros 
        // $post =new Post;
        // $post->titulo=$request->titulo;
        // $post->descripcion=$request->descripcion;
        // $post->imagen=$request->imagen;
        // $post->user_id= auth()->user()->id;
        // $post->save();


        $request->user()->posts()->create([
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
            'imagen'=>$request->imagen,
            'user_id'=> auth()->user()->id
        ]);


        return redirect()->route('posts.index',auth()->user()->username);
    }

}
