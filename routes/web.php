<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;


Route::get('/', function () {
    return redirect()->route('index');
});

Route::get('/posts', [PostController::class, 'index'])->name('index');

// Route::get('/categories',function(){
//     return view('categories',[
//         'title' => 'Post Categories',
//         "active" => 'categories',
//         'categories' =>Category::withCount('posts')->get()
//     ]);
// });

// halaman single post
Route::get('post/{post:slug}',[PostController::class,'show'])->name('post.show');

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);

Route::get('/register', [RegisterController::class,'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class,'store']);

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index')->middleware('auth');


// Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');



Route::post('/comment',[CommentController::class,'store'])->name('comment.store')->middleware('auth');

Route::post('/post/{post:slug}/like', [LikeController::class, 'toggleLike'])->name('post.like')->middleware('auth');

Route::get('/dashboard/likes',[ LikeController::class,'show'])->name('dashboard.likes')->middleware('auth');

Route::get('/dashboard/comments',[ CommentController::class,'show'])->name('dashboard.comments')->middleware('auth');


