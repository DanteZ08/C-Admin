<?php

use App\Http\Controllers\ConsultantController;
use App\Models\Appointments;
use App\Models\Consultants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
Route::middleware('throttle:10000,60')->group(function () {

    // For login
    Route::get('/login', function () {
        return view('pages.cons-accounts.login');
    })->name('login');

    Route::get('logout', function () {
        Auth::logout();
        return Redirect::route('login');
    })->name('logout');

    Route::post('user_login', [ConsultantController::class, 'consultantLogin'])->name('cons_login');

    ///////////////////////////////////////////////////////////////////////


    //Only logged
    Route::middleware(['auth'])->group(function () {

        Route::get('/', function () {
            $appointments = Appointments::get();
            return view('pages.index', compact('appointments'));
        })->name('index');

        // Consultant 
        Route::prefix('consultants')->group(function () {
            Route::get('create', function () {
                return view('pages.cons-accounts.create-account');
            })->name('consultants.create');

            Route::post('consultant_create', [ConsultantController::class, 'createConsultantAccount'])->name('create-consultant-account');
        });

        //Appointments

    });

});

