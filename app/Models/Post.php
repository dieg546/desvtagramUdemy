<?php

namespace App\Models;

use App\Http\Controllers\LikeController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [

        'titulo',
        'descripcion',
        'imagen',
        'user_id'

    ];

    public function user()
    {

        return $this->belongsTo(User::class)->select(['name','username']); 

    }

    public function comentario()
    {

        return $this->hasMany(Comentario::class);

    }

    public function like()
    {

        return $this->hasMany(Like::class);

    }

    public function checkLike(User $user)
    {

        return $this->like->contains('user_id',$user->id);

    }
 
}
