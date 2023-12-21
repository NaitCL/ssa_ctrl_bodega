<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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
    return view('auth.login');
});

// Route::get('/register', function () {
//     return view('auth.register');
// });

// Route::get('/inventario', function () {
//     return view('menu.inventario');
// });

// Route::get('/despacho', function () {
//     return view('menu.despacho');
// });

// Route::get('/billing', function () {
//     return view('billing');
// });


Route::prefix('auth')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginVerify'])->name('login.verify');
    Route::get('register',[AuthController::class, 'register']);
    Route::post('register',[AuthController::class, 'registerVerify']);
});

// Rutas protegidas
Route::middleware('auth')->group(function(){
    Route::get('logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('inventario', function () {
        return view('menu.inventario');
    });
    Route::get('despacho', function () {
        return view('menu.despacho');
    });
});