<?php

use App\Http\Controllers\ConsultantController;
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
    return view('pages.index');
});

Route::get('/login', function () {
    return view('pages.cons-accounts.login');
})->name('login');


Route::get('consultants/create',function(){
    return view('pages.cons-accounts.create-account');
})->name('consultants.create');

Route::post('consultant_create', [ConsultantController::class, 'CreateConsultantAccount'])->name('create-consultant-account');
