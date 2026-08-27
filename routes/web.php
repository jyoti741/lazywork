<?php

use Illuminate\Support\Facades\Route;

// Government Public Complaint Portal Routes
Route::get('/', function () {
    return view('portal.home');
})->name('home');

Route::get('/complaints', function () {
    return view('portal.complaints');
})->name('complaints');

Route::get('/services', function () {
    return view('portal.services');
})->name('services');

Route::get('/contact', function () {
    return view('portal.contact');
})->name('contact');

// Admin Officer Management Dashboard Route
Route::get('/admin/complaints', function () {
    return view('portal.admin-complaints');
})->name('admin.complaints');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
