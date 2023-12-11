<?php

use App\Http\Controllers\Cashbook;
use App\Http\Controllers\CashbookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DPSController;
use App\Http\Controllers\FDRController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CroronJobController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TransectionController;
use App\Http\Controllers\MemberProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SkillsController;

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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('backend/master');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Profile Edit,Update,Delete
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/project/update/', [ProfileController::class, 'project_update'])->name('project.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('employee',EmployeeController::class);
    Route::resource('skill', SkillController::class);    
});

require __DIR__ . '/auth.php';
