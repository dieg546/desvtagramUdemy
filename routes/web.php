<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home.index'); 
 
Route::get('/Resgistro',[RegistroController::class, 'index'])->name('Registro'); 
Route::post('/Resgistro',[RegistroController::class, 'store']); 

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']); 
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/{user:username}',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/{user:username}/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/{user:username}/{post}',[PostController::class,'show'])->name('posts.show');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');


Route::post('/posts/{user:username}/{post}',[ComentarioController::class,'store'])->name('coment.store');

Route::post('/imagenes',[ImagenController::class, 'store'])->name('imagenes.store');

//Likes de las fotos

Route::post('/likes/posts/{post}', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/likes/posts/{post}',[LikeController::class,'destroy'])->name('posts.likes.destroy');

// Route::post('/posts/{post}',[TaskController::class,'store'])->name('tucupita.task.store');

//Rutas para visualizacion de perfil

Route::get('/{user:username}/editar-perfil',[PerfilController::class,'index'])->name('perfil.index');
Route::post('/{user:username}/editar-perfil',[PerfilController::class,'store'])->name('perfil.store');


//Rutas para followers

Route::post('/follow/{user:username}',[FollowersController::class,'store'])->name('follow.store');
Route::post('/unfollow/{user:username}',[FollowersController::class,'destroy'])->name('unfollow.destroy');


