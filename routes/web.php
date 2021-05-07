<?php
use Illuminate\Support\Facades\Route;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UrlsController;

Route::get('info', function() {
    return view('info');
})->name('info');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/url/{urls:id}', UrlsController::class)->name('url.show');
Route::get('/post/{post:id}', PostController::class)->name('post.show');
Route::get('/news/{news:id}', NewsController::class)->name('news.show');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $posts = auth()->user()->posts;
    $posts = $posts->sortByDesc('created_at');
    return view('dashboard', compact('posts'));
})->name('dashboard');
