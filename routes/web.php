<?php

use App\Http\Controllers\FollowerController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicProfileController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
 
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/@{user:username}' , [PublicProfileController::class , 'show'])->name('profile.show');

Route::get('/', [PostController::class , 'index'])
    ->name('dashboard');
Route::get('/@{username}/{post:slug}' , [PostController::class , 'show'])
    ->name('post.show');


Route::middleware(['auth' , 'verified'])->group(function(){

    Route::get('/category/{category}' , [PostController::class , 'category'])
    ->name('post.byCategory');

    Route::get('/post/create', [PostController::class , 'create'])
    ->name('post.create');

    Route::post('/post/create' , [PostController::class , 'store'])
    ->name('post.store');

  

    Route::post('/follow/{user}' , [FollowerController::class , 'followToggle'])
    ->name('follow');

    Route::post('/like/{post}' , [LikeController::class , 'likePost'])
    ->name('like');

    Route::get('/myposts' , [PostController::class ,'showMyPosts'])->name('profile.myposts');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// pour le choix de la langue
Route::get('/lang/{locale}' , function($locale){
    App::setLocale($locale);
    session()->put('locale',$locale);
    return back();
})->name('lang.switch');

require __DIR__.'/auth.php';
 