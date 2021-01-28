<?php

use Illuminate\Http\Request;
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
    unlink('data.json');
    return null;
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', [App\Http\Controllers\much::class, 'CreateForm']);

Route::post('/welcome', [App\Http\Controllers\much::class, 'Math'])->name('math');