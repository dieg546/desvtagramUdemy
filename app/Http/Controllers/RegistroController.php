<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class RegistroController extends Controller
{
    //

    public function index()
    {

        return view('autenticacion.registro');
    
    }

    public function store(Request $request)
    {

        //dd($request);
        //dd($request->get('name'));
        //dd($request->get('username'));
        //dd($request->get('email'));
        //dd($request->get('password'));

        $this->validate($request,[

            "name"=>["required","min:2","max:20"],
            "email"=>["required","unique:users","email","max:30"],
            "username"=>["required","unique:users","min:3","max:30"],
            "password"=>["required","confirmed","min:6"]

        ]);
 

        // dd('Creando Usuario...');
        User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>Str::slug($request->username),
            'password'=>$request->password
            
        ]);

        //Para autenticar al usuario

        // auth()->attempt([

        //     'email'=>$request->email,
        //     'password'=>$request->password

        // ]);

        //Otro metodo de autenticacion

        auth()->attempt($request->only('email','password'));

        return redirect()->route('posts.index',auth()->user()->username);

    }
}
