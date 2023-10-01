@extends('layouts.app')

@section('titulo')
    Inicio de sesion para DevStagram.
@endsection

@section('contenido') 
    
<div class="md:flex md:justify-center md:items-center md:gap-10">
    <div class="md:w-5/12">
        <img src="{{asset('img/login.jpg')}}" alt="Imagen de Inicio">
    </div>

    <div class="md:w-4/12 bg-white shadow-xl p-6 rounded">
        <form method="POST" action="{{route('login')}}" novalidate>
            @csrf  

            @if (session('mensaje'))
                
                <p class=" text-red-600">
                    {{session('mensaje')}}
                </p>

            @endif

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

            <div class=" mb-5"> 
                <input type="checkbox" name="remember" id="" > <label class="text-gray-500 text-sm">Mantener mi sesion abierta.</label> 
            </div>

            <input 
                type="submit" 
                value="Iniciar Sesion"
                class="bg-sky-600 hover:bg-sky-700 transition-colors
                cursor-pointer uppercase font-bold w-full text-white rounded-lg h-16"
            >
            
            

        </form>
    </div>
    
</div>

@endsection