<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('members')->controller(MemberController::class)->group(function (){
    Route::get('/', 'all')->name('members');
    Route::get('/create', 'create')->name('members.create');
    Route::post('/create', 'store')->name('members.create');
    Route::get('/{member}', 'details')->name('members.detail');
    Route::get('edit/{member}', 'edit')->name('members.edit');
    Route::post('edit/{member}', 'update')->name('members.edit');
});

Route::middleware('auth')->controller(AttendanceController::class)->group(function (){
    Route::get('/attendance/add/{member}', 'add')->name('attendance.add');
    Route::post('/attendance/add', 'store')->name('attendance.add');
    Route::get('/attendance/{member}', 'log')->name('attendance.log');
});

Route::middleware('auth')->controller(PaymentController::class)->group(function (){
    Route::get('/payments', 'all')->name('payments');
    Route::get('/payments/add/{member}', 'add')->name('payments.add');
    Route::post('/payments/add', 'store')->name('payments.add');
    Route::get('/payments/{member}', 'paylog')->name('payments.log');
});

require __DIR__.'/auth.php';
