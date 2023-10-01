<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('styles')
    <title>DevStagram - @yield('titulo')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    @livewireStyles

</head>
<body class=" bg-gray-200">
    

    <header class="p-5 border-b bg-white shadow">

        <div class="container mx-auto flex justify-between 
        items-center">

            <h1 class="text-3xl font-black"> 
                DevStagram
            </h1>

            @if (auth()->user())

                <nav class=" flex items-center gap-2 justify-center">

                    <a href="{{route('posts.create',auth()->user()->username) }}" class=" flex items-center  bg-white border p-2 text-gray-600 rounded
                        text-sm uppercase font-bold cursor-pointer">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        crear 

                    </a>
                    
                    <p></p>

                    <span class=" font-bold">Hola: <a href="{{route('posts.index',auth()->user()->username)}}"> {{auth()->user()->username}}</a></span>

                    <form method="POST" action="{{route('logout')}}" class=" mb-0">
                    
                        @csrf

                        <button type="submit" class="font-bold uppercase text-gray-500
                        text-sm"> Cerrar Sesion</button>

                    </form>

                </nav>

                

            @else
                
                <nav class="flex gap-5">
                    <a class="font-bold uppercase" href="{{route('login')}}">Login</a>
                    <a class="font-bold uppercase" href="{{route('Registro')}}">Crear Cuenta</a>
                </nav>

            @endif

            

        </div>

        

    </header>

    <main class="container mx-auto mt-10">

        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>

        @yield('contenido')

    </main>

    <footer class="mt-10 p-10 font-bold text-center text-2xl text-gray-500">
        DevStagram - Todos los derechos reservados, Diegolino {{ now()->year }}
    </footer>

    
    @livewireScripts

</body> 
</html>