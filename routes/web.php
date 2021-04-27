<?php

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

Route::get('/queries/{event}', function ($event) {
    $events = \App\Models\Event::all();
    // $event = \App\Models\Event::find($event);
    return $events;
});

Route::get('/hello-world', [\App\Http\Controllers\HelloWorldController::class, 'helloWorld']);

Route::get('/hello/{name?}', [\App\Http\Controllers\HelloWorldController::class, 'hello']);

