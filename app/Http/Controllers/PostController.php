<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //

    public function __construct()
    {
        
        $this->middleware('auth')->except(['index','show']);

    }

    public function index(User $user)
    {

        // dd($user->username);

        $posts = Post::where('user_id',$user->id)->paginate(4);

        // dd($posts);

        return view('dashboard',[

            'user' => $user,
            'posts' => $posts

        ]); 
 
    }

    public function create()
    {

        // dd('Creando un posts...');

        return view('posts.create');

    }

    public function store(Request $request)
    {

        $this->validate($request,[

            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'

        ]);

        // Post::create([

        //     'titulo' =>$request->titulo,
        //     'descripcion'=>$request->descripcion,
        //     'imagen'=>$request->imagen,
        //     'user_id'=> auth()->user()->id

        // ]);
 
        $request->user()->posts()->create([

            'titulo' => $request->titulo,
            'descripcion'=>$request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id

        ]);

        return redirect()->route('posts.index',auth()->user()->username);
        // dd('Making...');

    }

    public function show(User $user,Post $post,Comentario $comentario)
    {

        // $posts = Post::where('id',$this->id)->get();
        return view('posts.show',[

            'post'=> $post,
            'user'=>$user,

        ]);

    }

    public function destroy(Post $post)
    {

        $this->authorize('delete',$post);
        $post->delete();

        //Elimnando una imagen

        $image_path = public_path('uploads/' . $post->imagen);

        if(File::exists($image_path)){

            unlink($image_path);

        }

        return redirect()->route('posts.index',auth()->user()->username);
        // if($post->user_id == auth()->user()->id){

        //     dd("eliminando publicacion del usuario");

        // }else{

        //     dd("Nope, no es el usuario");

        // }

        

    }

}
 