<div>

    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @foreach ($posts as $post)
        
                <div>
                    <a href="{{route('posts.show',['post'=>$post,'user'=>$post->user->username])}}">
                        <img src="{{asset('uploads') . '/' . $post->imagen}}" alt="Titulo de imagen {{$post->titulo}}">
                    </a>

                </div>

            @endforeach

        </div>
        <div class=" mt-10 flex-row">
            {{$posts->links('pagination::tailwind')}}
        </div>
    @else
        
        <p class=" text-gray-600 font-bold text-center">No hay un coño mijo</p>

    @endif
</div>