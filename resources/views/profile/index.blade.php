

@extends('layouts.app')

@section('titulo')
    
    Edicion de Perfil

@endsection

@section('contenido')
    
    <div class=" md:flex md:justify-center mt-10">

        <div class=" md:w-1/2 bg-white p-10">
            <form action="{{route('perfil.store',auth()->user()->username)}}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class=" flex flex-col mb-5">
                    <label for="username" class=" text-xl text-gray-600 font-bold">
                        Username
                    </label>

                    <input 
                        type="text"
                        name="username"
                        id="username"
                        class="border p-3 rounded-md
                        @error('username') border-red-500 @enderror"
                        value="{{auth()->user()->username}}"
                    >

                    @error('username')

                        <p class=" text-red-500 text-center">{{$message}}</p>
                        
                    @enderror

                </div>

                <div class=" flex flex-col mb-5">
                    <label for="email" class=" text-xl text-gray-600 font-bold">
                        Email
                    </label>

                    <input 
                        type="text"
                        name="email"
                        id="email"
                        class="border p-3 rounded-md
                        @error('email') border-red-500 @enderror"
                        value="{{auth()->user()->email}}"
                    >

                    @error('email')

                        <p class=" text-red-500 text-center">{{$message}}</p>
                        
                    @enderror

                </div>

                <div class=" flex flex-col mb-5">
                    <label for="password" class=" text-xl text-gray-600 font-bold">
                        Password
                    </label>

                    <input 
                        type="password"
                        name="password"
                        id="password"
                        class="border p-3 rounded-md
                        @error('password') border-red-500 @enderror"
                        
                    >

                    @error('password')

                        <p class=" text-red-500 text-center">{{$message}}</p>
                        
                    @enderror

                    @if (session('mensaje'))

                        <p class=" text-red-500 text-center">{{session('mensaje')}}</p>

                    @endif

                </div>

                <div class=" flex flex-col mb-5">
                    <label for="new_password" class=" text-xl text-gray-600 font-bold">
                        Nuevo password
                    </label>

                    <input 
                        type="password"
                        name="new_password"
                        id="new_password"
                        class="border p-3 rounded-md
                        @error('new_password') border-red-500 @enderror"
                        

                    >

                    @error('new_password')

                        <p class=" text-red-500 text-center">{{$message}}</p>
                        
                    @enderror

                </div>

                <div class=" flex flex-col">

                    <label for="" class="text-xl text-gray-600 font-bold">
                        Imagen de perfil
                    </label>

                    <input 
                        type="file"
                        name="imagen"
                        id="imagen"
                        accept=".jpg,.jpeg,.png"
                        class="mt-3"
                        
                    >

                    

                </div>

                <input 
                    type="submit" 
                    value="Guardar cambios"
                    class=" mt-5 bg-sky-500 hover:bg-sky-700 w-full cursor-pointer h-10 rounded-md 
                    text-white font-bold"

                >

            </form>
        </div>

    </div>

@endsection