<?php
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('forms', FormController::class)->except('show');
Route::delete('forms/destroy/all', 'FormController@destroyMultiple')->name('forms.destroyMultiple');



Route::resource('fields', FieldController::class)->except('show');

// Route::post('/UpdateStatus', [App\Http\Controllers\BaseController::class, 'UpdateStatus'])->name('UpdateStatus'); 
