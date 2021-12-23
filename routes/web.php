<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainerController;//import
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsimController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User1Controller;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\ImportExport1Controller;
use App\Http\Controllers\ImportExport2Controller;
use App\Http\Controllers\ImportExport3Controller;
use App\Http\Controllers\CaptchaValidationController;
use App\Http\Controllers\TestController;



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

Route::resource('user',
    '\App\Http\Controllers\UserController');

Route::resource('user1',
    '\App\Http\Controllers\User1Controller');

Route::resource('user2',
    '\App\Http\Controllers\User2Controller');

Route::resource('user3',
    '\App\Http\Controllers\User3Controller');


Route::resource('admin',
    '\App\Http\Controllers\AdminController');

Route::resource('fum',
    '\App\Http\Controllers\FumController')->middleware('is_admin2');

Route::resource('fupm',
    '\App\Http\Controllers\FupmController');

Route::resource('fusim',
    '\App\Http\Controllers\FusimController');


Route::resource('pum',
    '\App\Http\Controllers\PumController')->middleware('is_admin2');

    Route::resource('pupm',
    '\App\Http\Controllers\PupmController');
    Route::resource('pusim',
    '\App\Http\Controllers\PusimController');


Route::resource('um',
    '\App\Http\Controllers\UmController')->middleware('is_admin2');

Route::resource('upm',
    '\App\Http\Controllers\UpmController')->middleware('is_admin1');

Route::resource('usim',
    '\App\Http\Controllers\UsimController')->middleware('is_admin');




//route to call TrainerController@create
//laravel8 redo route declaration
//Route::get('/trainer/create',
    //[TrainerController::class, 'create'])//pointing to function create
    //->name('trainer.create');

Route::get('/', function () {
    return view('home');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::get('file-import-export', [ImportExportController::class, 'fileImportExport']);
Route::post('file-import', [ImportExportController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [ImportExportController::class, 'fileExport'])->name('file-export');
Route::get('contact-form-captcha', [CaptchaValidationController::class, 'index']);
Route::post('captcha-validation', [CaptchaValidationController::class, 'capthcaFormValidate']);
Route::get('reload-captcha', [CaptchaValidationController::class, 'reloadCaptcha']);

Route::get('file-import-export1', [ImportExport1Controller::class, 'fileImportExport1']);
Route::post('file-import1', [ImportExport1Controller::class, 'fileImport'])->name('file-import1');
Route::get('file-export1', [ImportExport1Controller::class, 'fileExport'])->name('file-export1');


Route::get('file-import-export2', [ImportExport2Controller::class, 'fileImportExport2']);
Route::post('file-import2', [ImportExport2Controller::class, 'fileImport'])->name('file-import2');
Route::get('file-export2', [ImportExport2Controller::class, 'fileExport'])->name('file-export2');



Route::get('file-import-export3', [ImportExport3Controller::class, 'fileImportExport3']);
Route::post('file-import3', [ImportExport3Controller::class, 'fileImport'])->name('file-import3');
Route::get('file-export3', [ImportExport3Controller::class, 'fileExport'])->name('file-export3');

Route::get('admin/list', [AdminController::class, 'getAdmin'])->name('admin.list');

Route::get('admin/list', [AdminController::class, 'index']);

