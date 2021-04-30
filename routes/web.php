<?php

use App\Http\Controllers\EventController;
use App\Models\Event;
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
    return view('welcome');
});

// Route::get('/queries/{id}', function ($id) {
//     $event = \App\Models\Event::find($id);
//     return $id;
// });

Route::get('/hello-world', [\App\Http\Controllers\HelloWorldController::class, 'helloWorld']);

Route::get('/hello/{name?}', [\App\Http\Controllers\HelloWorldController::class, 'hello']);

Route::resource('/events', EventController::class);

