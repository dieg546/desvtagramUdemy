@extends('layouts.app')

@section('titulo')
    Registro para DevStagram.
@endsection
 
@section('contenido')
    
    <div class="md:flex md:justify-center md:items-center md:gap-10">
        <div class="md:w-5/12">
            <img src="{{asset('img/registrar.jpg')}}" alt="Imagen de Registro">
        </div>

        <div class="md:w-4/12 bg-white shadow-xl p-6 rounded">
            <form action="{{ route('Registro') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" id="nameLabel" class="mb-2 
                    block uppercase text-gray-500 font-bold">

                        Nombre

                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name"
                        placeholder="Tu nombre..."
                        class="border p-3 w-full rounded-lg
                        @error('name') border-red-600 @enderror"
                        value="{{old('name')}}"
                    >

                    @error('name')

                        <p class=" text-red-600">{{$message}}</p>
                        
                    @enderror

                </div>

                <div class="mb-5">
                    <label for="username" id="name" class="mb-2 
                    block uppercase text-gray-500 font-bold">

                        Nombre de Usuario

                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username"
                        placeholder="Usuario..."
                        class="border p-3 w-full rounded-lg 
                        @error('username') border-red-600 @enderror"
                        value="{{old('username')}}"
                    >

                    @error('username')

                        <p class=" text-red-600">{{$message}}</p>
                        
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" id="emailLabel" class="mb-2 
                    block uppercase text-gray-500 font-bold">

                        Email

                    </label>
                    <input 
                        type="text" 
                        id="email" 
                        name="email"
                        placeholder="Tu email"
                        class="border p-3 w-full rounded-lg 
                        @error('email') border-red-600 @enderror"
                        value="{{old('email')}}"
                    >

                    @error('email')

                        <p class=" text-red-600">{{$message}}</p>
                        
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" id="passwordLabel" class="mb-2 
                    block uppercase text-gray-500 font-bold">

                        Password

                    </label>
                    <input 
                        type="text" 
                        id="password" 
                        name="password"
                        placeholder="Tu password para registro"
                        class="border p-3 w-full rounded-lg 
                        @error('password') border-red-600 @enderror"
                        value="{{old('password')}}"

                    >

                    @error('password')

                        <p class=" text-red-600">{{$message}}</p>
                        
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" id="password_confirmationLabel" class="mb-2 
                    block uppercase text-gray-500 font-bold">

                        Repeat Password

                    </label>
                    <input 
                        type="text" 
                        id="password_confirmation" 
                        name="password_confirmation"
                        placeholder="Repite tu password"
                        class="border p-3 w-full rounded-lg"
                    >
                </div> 

                <input 
                    type="submit" 
                    value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors
                    cursor-pointer uppercase font-bold w-full text-white rounded-lg h-16"
                >
                
            </form>
        </div>
        
    </div>

@endsection