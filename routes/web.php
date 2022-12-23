<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ArticlesController::class,'index'])->name('root');
Route::resource('articles', ArticlesController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
