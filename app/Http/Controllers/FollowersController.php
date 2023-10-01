<?php

namespace App\Http\Controllers;

use App\Models\Followers;
use App\Models\User;
use Illuminate\Http\Request;

class FollowersController extends Controller
{
    //

    public function __construct()
    {
    
        $this->middleware('auth');

    }

    public function store(Request $request,User $user)
    {

        
        $user->followers()->attach(auth()->user()->id);

        return back();

    }

    public function destroy(User $user)
    {

        $user->followers()->detach(auth()->user()->id);
        return back(); 
    
    }


}
