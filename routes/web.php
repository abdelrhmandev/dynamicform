<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FieldController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('buildingtypes', BuildingTypeController::class)->except('show');
Route::delete('/buildingtypes/destroy/all', [App\Http\Controllers\BuildingTypeController::class, 'destroyMultiple'])->name('buildingtypes.destroyMultiple');

Route::resource('fields', FieldController::class)->except('show');
Route::delete('/fields/destroy/all', 'FieldController@destroyMultiple')->name('fields.destroyMultiple');

Route::resource('forms', FormController::class)->except('show');
Route::delete('forms/destroy/all', 'FormController@destroyMultiple')->name('forms.destroyMultiple');

Route::post('/saveFormfield', [App\Http\Controllers\FormController::class, 'saveFormfield'])->name('forms.saveFormfield');

Route::delete('/AjaxRemoveFieldFillable/{id}', [App\Http\Controllers\FieldController::class, 'AjaxRemoveFieldFillable'])->name('fields.AjaxRemoveFieldFillable');
Route::delete('/AjaxRemoveMultiFieldFillable', [App\Http\Controllers\FieldController::class, 'AjaxRemoveMultiFieldFillable'])->name('fields.AjaxRemoveMultiFieldFillable');

Route::post('/form/AjaxLoadjKanban', [App\Http\Controllers\FormController::class, 'AjaxLoadjKanban'])->name('forms.AjaxLoadjKanban');

Route::post('/fields/loadFieldInfo', 'FieldController@loadFieldInfo')->name('loadFieldInfo');

Route::resource('buildings', BuildingController::class)->except('show');

Route::post('/GetAjaxFormdatabuildings', [App\Http\Controllers\BuildingController::class, 'AjaxFormdata'])->name('AjaxFormdata');

Route::post('/UpdateStatus', [App\Http\Controllers\BaseController::class, 'UpdateStatus'])->name('UpdateStatus');
