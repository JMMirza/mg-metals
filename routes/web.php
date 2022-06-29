<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\CatergoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerProductController;
use App\Http\Controllers\CustomerShareholder;
use App\Http\Controllers\CustomerTrading;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\HomeController as HomeCtrl;
use App\Http\Controllers\FrontendCustomerController;
use App\Http\Controllers\ManufacturerController;
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



Route::get('/', [HomeCtrl::class, 'index']);
Route::get('/home', [HomeCtrl::class, 'index'])->name('home');
Route::get('/shop', [HomeCtrl::class, 'shop'])->name('shop');
Route::get('/about-us', [HomeCtrl::class, 'about_us'])->name('about_us');
Route::get('/services', [HomeCtrl::class, 'services'])->name('services');
Route::get('/contact-us', [HomeCtrl::class, 'contact_us'])->name('contact_us');
Route::get('/single-product/{id}', [HomeCtrl::class, 'single_product'])->name('single-product');
Route::get('/customer-login', [HomeCtrl::class, 'login'])->name('customer_login');
Route::get('/customer-register', [HomeCtrl::class, 'register'])->name('customer_register');
Route::post('/customer-register-account', [HomeCtrl::class, 'register_account'])->name('customer-register-account');
Route::get('/language/{locale}', [HomeCtrl::class, 'switch_language'])->name('language');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resources(['/customers' => CustomerController::class]);
    Route::resources(['agents' => AgentController::class]);
    Route::resources(['categories' => CatergoryController::class]);
    Route::resources(['products' => ProductController::class]);
    Route::resources(['customer-products' => CustomerProductController::class]);
    Route::resources(['manufacturers' => ManufacturerController::class]);
    Route::resources(['customer-profile-data' => FrontendCustomerController::class]);
    Route::resources(['customer-shareholders' => CustomerShareholder::class]);
    Route::resources(['customer-trading' => CustomerTrading::class]);
    Route::get('customer-product/{id}', [CustomerProductController::class, 'customer_products'])->name('customer-product');
    Route::get('customer-product-ajax/{id}', [CustomerProductController::class, 'customer_products_ajax'])->name('customer-product-ajax');
    Route::get('load-shareholders', [CustomerShareholder::class, 'load_shareholders'])->name('load-shareholders');
    Route::get('load-trading', [CustomerTrading::class, 'load_trading'])->name('load-trading');

    Route::post('/applicant-info-individual', [HomeCtrl::class, 'applicant_information_individual'])->name('applicant-info-individual');
    Route::post('/applicant-info-corporate', [HomeCtrl::class, 'applicant_information_corporate'])->name('applicant-info-corporate');
    Route::get('/customer-profile', [HomeCtrl::class, 'profile'])->name('customer_profile');
});
