<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\AuthController;
use App\http\controllers\HomeController;

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
    return view('home');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get ('/register', [AuthController::class, 'register'])->name('register');
    Route::post ('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get ('/login', [AuthController::class, 'login'])->name('login');
    Route::post ('/login', [AuthController::class, 'loginPost'])->name('login');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get ('/home', [AuthController::class, 'index']);
        Route::post ('/logout', [AuthController::class, 'logout'])->name('logout');
        });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// vai alla pagina demo
Route::view('/home', 'home');

Route::get('/Registeruser',[AuthController::class,'Registeruser'])->name('Registeruser');
Route::post('/register', [AuthController::class, 'RegisterPost'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

Route::get('/home',[HomeController::class, 'index']);
Route::delete('/logout',[AuthController::class, 'logout'])->name('logout');
