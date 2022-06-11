<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\HomeController as HomeCtrl;
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

Auth::routes();

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('auth.login');
    }
})->name('index');

Route::get('/home', [HomeCtrl::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {

    // CRM Routes Starts Here
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});
