<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RegisterController;
use Sayakb\Captcha\Facades\Captcha;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/about', [IndexController::class, 'about'])->name('about');

Route::get('/vision', [IndexController::class, 'vision'])->name('vision');

Route::get('/mission', [IndexController::class, 'mission'])->name('mission');

Route::get('/future-scenario', [IndexController::class, 'future_scenario'])->name('future_scenario');

Route::get('/members', [IndexController::class, 'members'])->name('members');

Route::get('/rules', [IndexController::class, 'rules'])->name('rules');

Route::get('/services-and-standards', [IndexController::class, 'services_and_standards'])->name('services-and-standards');

Route::get('/complaints', [IndexController::class, 'complaints'])->name('complaints');

Route::get('/contact', [IndexController::class, 'contact'])->name('contact');

Route::get('/login', [IndexController::class, 'login'])->name('login');

Route::get('/login', [RegisterController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// ------------after login ------------------
Route::get('/user_login', [RegisterController::class, 'user_login'])->name('user_login');

Route::get('/apply-form-s', [RegisterController::class, 'apply_form_s'])->name('apply-form-s');

Route::get('/apply-form-w', [RegisterController::class, 'apply_form_w'])->name('apply-form-w');




Route::get('captcha/image', function () {
    return Captcha::create();
});
