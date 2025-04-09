<?php

use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\FormAController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PDFFormAController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Mews\Captcha\Facades\Captcha as FacadesCaptcha;

// ------------------------ Public Pages ------------------------

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

// ------------------------ Auth: Register/Login ------------------------

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/loginpage', [RegisterController::class, 'login'])->name('loginpage');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'check'])->name('login.check');
Route::post('/login/verify', [LoginController::class, 'verifyOtp'])->name('login.verify');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// ------------------------ Finalize Login (redirect after OTP) ------------------------

Route::get('/finalize-login', function () {
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Session expired. Please login again.');
    }
    return redirect()->route('dashboard');
})->name('finalize.login');

// ------------------------ Dashboard (Protected) ------------------------

Route::get('/dashboard', [LoginController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('auth.dashboard');

// ------------------------ Captcha ------------------------

Route::get('captcha/image', function () {
    return FacadesCaptcha::create();
});

Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);

// ------------------------ Protected Routes (Logged-in Users Only) ------------------------

Route::middleware(['auth'])->group(function () {
    Route::get('/user_login', [RegisterController::class, 'user_login'])->name('user_login');
    Route::get('/apply-form-s', [RegisterController::class, 'apply_form_s'])->name('apply-form-s');
    Route::get('/apply-form-w', [RegisterController::class, 'apply_form_w'])->name('apply-form-w');
    Route::get('/apply-form-wh', [RegisterController::class, 'apply_form_wh'])->name('apply-form-wh');
    Route::get('/apply-form-a', [RegisterController::class, 'apply_form_a'])->name('apply-form-a');
    Route::get('/successpage', [RegisterController::class, 'successpage'])->name('successpage');
});

// ------------------------ Form Submit & PDF Routes ------------------------

Route::post('/form/store', [FormController::class, 'store'])->name('form.store');
Route::post('/forma/store', [FormAController::class, 'store'])->name('forma.store');

Route::get('/generate-pdf/{login_id}', [PDFController::class, 'generatePDF'])->name('generate.pdf');
Route::get('/generateTamilPDF/{login_id}', [PDFController::class, 'generateTamilPDF'])->name('generate.tamil.pdf');

Route::get('/generatea-pdf/{login_id}', [PDFFormAController::class, 'generateaPDF'])->name('generatea.pdf');
Route::get('/generateaTamilPDF/{login_id}', [PDFFormAController::class, 'generateaTamilPDF'])->name('generatea.tamil.pdf');

// ------------------------ Dynamic Form Access ------------------------

Route::get('/apply-form/{form_name}/{application_id}', [RegisterController::class, 'apply_form'])->name('apply-form');
