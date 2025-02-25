<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\EmployersController;

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
Route::get('/', [HomeController::class, 'index']);
//Route::get('/jobs', [JobController::class, 'index']);
//Route::get('/jobs/{id}', [JobController::class, 'show']);
// Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register'); // Create a register page later
});
Route::get('/jobs',[JobsController::class, 'index']);
Route::get('/companies',[EmployersController::class,'index']);