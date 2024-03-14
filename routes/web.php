<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/messenger', fn() => view('messenger'));
Route::ResourceView('template');

Route::namespace('Sdkconsultoria\WhatsappCloudApi\Http\Controllers')
    // ->middleware('auth:sanctum')
    ->prefix('api/v1')
    ->group(\WhatsappCloudApi::routes());

Route::get('/messenger', fn() => view('messenger'));
Route::ResourceView('template');
