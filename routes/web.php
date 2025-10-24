<?php

use App\Models\Article;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticlesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $articles=Article::with('category')
                        ->filter(request('search'))
                        ->latest()
                        ->paginate(10);
    return view('dashboard',compact('articles'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('article/{id}',[ArticlesController::class,'show'])->name('articles.show');
    // Route::get('article/create',[ArticlesController::class,'create'])->name('articles.create');
    Route::resource('articles', ArticlesController::class);
});

require __DIR__.'/auth.php';
