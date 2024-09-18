<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\VisaController;
use App\Http\Controllers\admin\VisaFileController;
use App\Http\Controllers\WebController;
use App\Http\Middleware\AdminGuard;
use App\Models\VisaInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// WEB ROUTES
Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/visa/enquiry', [WebController::class, 'visa_enquiry'])->name('visa-enquiry');
Route::post('/visa/enquiry', [WebController::class, 'visa_enquiry_post'])->name('visa-enquiry-post');

Auth::routes();

// ADMIN ROUTES
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/admin')->name('admin.')->middleware([AdminGuard::class])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // VISA
    Route::get('/visa', [VisaController::class, 'index'])->name('visa.index');
    Route::get('/visa/create', [VisaController::class, 'create'])->name('visa.create');
    Route::post('/visa/store', [VisaController::class, 'store'])->name('visa.store');
    Route::get('/visa/view/{id}', [VisaController::class, 'view'])->name('visa.view');
    Route::get('/visa/delete/{id}', [VisaController::class, 'delete'])->name('visa.delete');
    Route::get('/visa/edit/{id}', [VisaController::class, 'edit'])->name('visa.edit');
    Route::post('/visa/update', [VisaController::class, 'update'])->name('visa.update');
    Route::post('/visa/file/upload', [VisaFileController::class, 'store'])->name('visa.file.upload');
    Route::get('/visa/file/delete/{id}', [VisaFileController::class, 'delete'])->name('visa.file.delete');
});
