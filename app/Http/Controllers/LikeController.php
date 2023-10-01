<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //

    public function store(Request $request, Post $post)
    {
        // dd("Dando Like"); 
        // dd($request->user()->id);

        $post->like()->create([

            'user_id' => $request->user()->id,
            'post_id' => $post->id
            
        ]);

        return back();

    }

    public function destroy(Request $request,Post $post)
    {

        $request->user()->like()->where('post_id',$post->id)->delete();

        return back();
        
    }

}
