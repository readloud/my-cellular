<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Frontend
Route::get('/', [HomeController::class, 'index'])->name('home');

// Testimonial Store (AJAX)
Route::post('/testimonial/store', [AdminController::class, 'storeTestimonial'])->name('testimonial.store');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/gallery/upload', [AdminController::class, 'uploadGallery'])->name('admin.gallery.upload');
    Route::delete('/gallery/{id}', [AdminController::class, 'deleteGallery'])->name('admin.gallery.delete');
    Route::get('/testimonial/approve/{id}', [AdminController::class, 'approveTestimonial'])->name('admin.testimonial.approve');
    Route::delete('/testimonial/{id}', [AdminController::class, 'deleteTestimonial'])->name('admin.testimonial.delete');
});