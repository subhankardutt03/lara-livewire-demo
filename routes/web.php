<?php

use App\Http\Livewire\Eventtuts;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $comments = Comment::latest()->get();
    return view('welcome', compact('comments'));
});
Route::get('/events', function () {
    return view('index');
});