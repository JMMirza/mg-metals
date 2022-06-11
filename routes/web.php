<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\CatergoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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


Route::group(['middleware' => ['auth']], function () {

    // CRM Routes Starts Here
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resources(['/customers' => CustomerController::class]);
    Route::resources(['agents' => AgentController::class]);
    Route::resources(['categories' => CatergoryController::class]);
    Route::resources(['products' => ProductController::class]);
});
