<body>
    @extends('layouts.app')

    @section('titulo')
        
        @auth
            @if ($user->username == auth()->user()->username)
                Tu Cuenta: {{$user->username}}

            @else
                
                Cuenta de: {{$user->username}}

            @endif
            
        @endauth

        

    @endsection

    @section('contenido') 
        

        @if (session('mensaje'))

            <div id="alert-1" class="flex items-center p-4 mb-4 text-white rounded-lg  bg-green-600 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    Cambios realizados correctamente
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>

        @endif

        <div class="flex justify-center">
            
            

            <div class="w-full md:w-8/12 flex flex-col items-center md:flex-row justify-center">

                <div class="w-6/12 lg:w-4/12 px-5">

                    @if ($user->imagenp)

                        <div class=" w-full rounded-full overflow-hidden">
                            <img src="{{asset('profiles/' . $user->imagenp)}}" alt="ImagenUsuario">
                        </div>

                        
                    @else
                        <img src="{{asset('img/usuario.svg')}}" alt="ImagenUsuario">
                    @endif

                    
                </div>
                <div class="md:w-6/12 lg:w-4/12 px-5 flex flex-col items-center p-10 md:justify-center md:items-start">
                    
                    <div class=" flex gap-2 justify-center items-center">
                        <p class="text-3xl "> {{$user->username}} </p>

                        @auth
                            
                            @if ($user->id === auth()->user()->id)
                                
                                <a href="{{route('perfil.index',$user->username)}}" class=" text-gray-600 hover:text-gray-800">

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>
                                    

                                </a>

                            @endif

                        @endauth

                        

                    </div>

                    @auth
                        
                        @if (auth()->user()->id != $user->id)

                            

                            @if ($user->followers->contains(auth()->user()->id))
                                
                                <form action="{{route('unfollow.destroy',$user->username)}}" method="POST" class="w-full mt-2">
                                    @csrf
                                    <input 
                                        type="submit" 
                                        value="Dejar de seguir"
                                        class=" h-8  bg-red-600 text-white rounded-md w-52
                                        cursor-pointer hover:bg-red-800"
                                    >
                                </form>
                            
                            @else
                                <form action="{{route('follow.store',$user->username)}}" method="POST" class="w-20 mt-2">
                                    @csrf
                                    <input 
                                        type="submit" 
                                        value="Seguir"
                                        class=" h-8  bg-blue-600 text-white rounded-md w-full
                                        cursor-pointer hover:bg-blue-800"
                                    >
                                </form>
                            @endif

                            
                            
                        @endif

                    @endauth

                    

                    <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                        {{$user->followers->count()}}
                        <span class=" font-normal"> @choice('Seguidor|Seguidores',$user->followers->count())</span>
                    </p>

                    <p class="text-gray-800 text-sm mb-3 font-bold">
                        {{$user->following->count()}}
                        <span class=" font-normal"> Siguiendo</span>
                    </p> 

                    <p class="text-gray-800 text-sm mb-3 font-bold">
                        {{$user->posts->count()}}
                        <span class=" font-normal"> Post</span>
                    </p>
                </div>

            </div>  

        </div> 

        <section class="container mx-auto mt-10">

            <h2 class="my-10 text-center text-4xl font-bold">Publicaciones</h2>
    
            <x-listar_posts :posts="$posts"/>

        </section>

    @endsection
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

