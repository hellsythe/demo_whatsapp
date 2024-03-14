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

$routes = function () {
    Route::get('waba/{wabaId}/init', 'WabaController@init')->name('waba.init');
    Route::get('waba/{wabaId}/get-templates', 'WabaController@loadTemplatesFromWaba')->name('waba.getTemplatesFromMeta');
    Route::get('waba/{wabaId}/get-info', 'WabaController@getWabaInfoFromMeta')->name('waba.getInfoFromMeta');
    Route::get('waba/{wabaId}/get-phones', 'WabaController@getWabaPhonesFromMeta')->name('waba.getPhonesFromMeta');

    Route::ApiResource('template', 'TemplateController');

    Route::post('message/send', 'MessageController@sendMessage')->name('message.send');
    Route::post('message/template/send', 'MessageController@sendTemplate')->name('message.template.send');
    Route::get('message', 'MessageController@index')->name('message.index');

    Route::get('waba-phone', 'WabaPhoneController@index')->name('waba_phone.waba_number');
    Route::get('waba-phone/{phoneId}/bussines_profile', 'WabaPhoneController@getBussinesProfile')->name('waba_phone.bussines_profile');
    Route::post('waba-phone/{phoneId}/bussines_profile', 'WabaPhoneController@setBussinesProfile')->name('waba_phone.storage_bussines_profile');

    Route::get('chat', 'ChatController@index')->name('chat.index');

    Route::post('campaign', 'CampaignController@store')->name('campaign.store');
};

Route::namespace('Sdkconsultoria\WhatsappCloudApi\Http\Controllers')
    // ->middleware('auth:sanctum')
    ->prefix('api/v1')
    ->group($routes);
