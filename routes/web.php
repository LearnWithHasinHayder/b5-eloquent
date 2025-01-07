<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data', [DataController::class, 'index']);
Route::get('/books', [DataController::class, 'books']);
Route::get('/add-book', [DataController::class, 'insertBooks']);
Route::get('/add-song', [DataController::class, 'insertSong']);
Route::get('/songs', [DataController::class, 'songs']);
