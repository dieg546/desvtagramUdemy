@extends('layouts.app')

@section('titulo')
    
    {{$post->titulo}}

@endsection

@section('contenido')


    {{-- {{dd($post)}} --}}

    <div class=" flex mx-auto gap-5"> 
 
        <div class=" w-1/2">
            <img src="{{asset('uploads' . '/' . $post->imagen)}}" alt="Imagen del post {{$post->titulo}}" width="700" height="700">

            <div class=" p-3 flex items-center gap-3">
                                

                @auth

                    {{-- @livewire('LikePost') --}}

                    {{-- <livewire:LikePost /> --}}

                    @if ($post->checkLike(auth()->user()))
                        
                        <form action="{{route('posts.likes.destroy',$post->id)}}" method="POST">
                            @method('DELETE')
                            @csrf

                            <div class=" my-5">

                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                    
                                </button> 

                            </div>

                        </form>

                    @else
                        
                        <form method="POST" action="{{route('posts.likes.store',$post)}}" >
                            @csrf
                            <div class=" my-5">

                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                    
                                </button>

                            </div>

                        </form>

                    @endif

                @endauth

                <p>{{$post->like->count()}} likes</p>

            </div>

            <div class=" p-3">
                <p class=" font-bold">{{$post->user->username}}</p>
                <p class=" text-sm text-gray-500 mt-3">

                    {{$post->created_at->diffForHumans()}}

                </p>

                <p class=" mt-5">
                    {{$post->descripcion}}
                </p>

            </div>

            @auth
                @if ($post->user->username == auth()->user()->username)
                    <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                        @method('DELETE')
                        @csrf

                        <input 
                            type="submit"
                            value="Eliminar Publicación"
                            class=" bg-red-500 hover:bg-red-700 transition-colors
                            text-white p-2 rounded-md"
                        >

                    </form>      
                @endif
            @endauth

        </div>

        <div class=" md:w-1/2 mt-6">
            
            <div class="shadow bg-white p-5">

                @if (auth()->user())

                    <p class=" text-2xl font-bold text-center">
                        Agrega un nuevo comentario
                    </p>

                    <form action="{{route('coment.store',['post'=>$post,'user'=>$user->username])}}" method="POST">

                        @csrf

                        <div class=" flex flex-col">
                            <label for="comentario" class=" mt-3 text-gray-600 text-xl font-bold">
                                Agrega un comentario
                            </label>

                            <textarea 
                                name="comentario" 
                                id="comentario" 
                                cols="30" 
                                placeholder="Agrega un comentario"
                                class=" mt-5 border-2 p-6 rounded-md
                                @error('comentario') border-red-600 @enderror"
                            ></textarea>

                            @error('comentario')
                                
                                <p class=" text-red-600">{{$message}}</p>

                            @enderror

                        </div>

                        <input 
                            type="submit"
                            value="Comentar"
                            class=" w-full bg-sky-600 h-10 rounded-lg font-bold
                            text-white mt-5"
                        >

                    </form>

                    
                @endif
                

                <div class=" bg-white shadow max-h-96 overflow-y-scroll mt-5 p-3">


                    @if ($post->comentario->count())
                        @foreach ($post->comentario as $comentario)
                            
                            <p>
                                <span class=" font-bold hover:text-gray-700">
                                    <a href="{{route('posts.index',$comentario->user->username)}}">
                                        {{$comentario->user->username}}
                                    </a> 
                                </span>{{$comentario->comentario}}
                            </p>
                            <p>{{$comentario->created_at->diffForHumans()}}</p>
                            <br>

                        @endforeach

                    @else
                        
                        <p class="">
                            No hay comentarios aún, se el primero en hacerlo!
                        </p>

                    @endif

                    

                </div>


            </div>

        </div>

    </div>

    
@endsection