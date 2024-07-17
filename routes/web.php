<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

Route::get('test', function () {
    return view('welcome');
});

Route::get('store-data', [PostController::class, 'store']);
Route::get('show/{id}', [PostController::class, 'show']);
Route::get('delete-all-post', [PostController::class, 'delete_all_post']);
Route::get('delete-post/{id}', [PostController::class, 'delete_post']);
