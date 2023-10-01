<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{

    public $post;

    public function like()
    {
        return "Este es un mensaje desde livewire";
        

    }

    public function render()
    {
        return view('livewire.LikePost');
    } 

    

}
