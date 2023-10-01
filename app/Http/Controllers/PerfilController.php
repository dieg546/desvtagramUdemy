<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    // 

    public function __construct()
    {
        
        $this->middleware('auth');

    }

    public function index(Request $request,User $user)
    {

        if($user->id===auth()->user()->id){
            return view('profile.index');
        }
        else{

            return redirect()->route('posts.index',auth()->user()->username);

        }


    }

    public function store(Request $request)
    {

        $request->request->add(['username'=> Str::slug($request->username)]);

        $this->validate($request,[

            "username" =>['required','min:3','max:30','unique:users,username,' . auth()->user()->id],
            "email" => ['required','email','max:30','unique:users,email,' . auth()->user()->id]

        ]);

        
        $usuarioDB = User::find(auth()->user()->id);
        $usuarioDB->username = $request->username;
        $usuarioDB->email = $request->email;

        if(Hash::check($request->password,$usuarioDB->password)){


            $this->validate($request,[

                "new_password" => 'required|min:3|max:15'

            ]);

            $usuarioDB->password = $request->new_password;

        }elseif($request->password!=null){

            return back()->with('mensaje','Password erroneo.');

        }
        //Añadiendo imagen

        if($request->imagen){
            
            $imagen = $request->file('imagen');

            $ImagenName=Str::uuid() . "." . $imagen->extension();

            $ImagenServer = Image::make($imagen);
            $ImagenServer->fit(500,500);

            $imagenPath = public_path('profiles') . "/" . $ImagenName;

            $ImagenServer->save($imagenPath);

            //Eliminando imagen anterior (si existe).

            if($usuarioDB->imagenp){
                
                $imagenAntiguaPath = public_path('profiles') . '/' . $usuarioDB->imagenp;
                if(File::exists($imagenAntiguaPath)) unlink($imagenAntiguaPath);
            } 

        }

        //Protegiendo la imagen de ser cambiada a NULL

        if($request->imagen) $usuarioDB->imagenp=$ImagenName;
        else{

            if(!$usuarioDB->imagenp) $usuarioDB->imagenp=null;

        }

        //Guardando datos en la DB
        $usuarioDB->save();

        return redirect()->route('posts.index',$usuarioDB->username)->with('mensaje','Datos Modificados!');

    }

}
