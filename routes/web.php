<?php

use Illuminate\Support\Arr;
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
// partie client

Route::get('/accueil', [App\Http\Controllers\AdminProducts::class, 'index'])->name('acceuil');

//Auth::routes();
 Route::get('/admin/login',[App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
 Route::post('/admin/login',[App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
 Route::post('/admin/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('admin/product',App\Http\Controllers\AdminProducts::class);
Route::resource('admin/category',App\Http\Controllers\AdminCategories::class);
//Auth::routes();
Route::get('/', [App\Http\Controllers\ShowController::class, 'showAllProducts'])->name('products');
Route::get('homme/products', [App\Http\Controllers\ShowController::class, 'showHommeProducts'])->name('homme.products');
Route::get('show/product/{id}', [App\Http\Controllers\ShowController::class, 'show'])->name('show.product');
Route::get('femme/products', [App\Http\Controllers\ShowController::class, 'showFemmeProducts'])->name('femme.products');
Route::get('solde/products', [App\Http\Controllers\ShowController::class, 'showSoldeProducts'])->name('solde.products');

Route::get('test', function () {
    $array2 = ['php', 'laravel', 'html','css'];
    $array=['XS','S','M','L','XL'];
    $randomed2 = Arr::random($array,2);
    print_r($randomed2);

});
