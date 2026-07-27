<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;

// Public Homepage & Alias
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/index.html', function() { return redirect()->route('home'); });

// Public Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/aboutus.html', [PageController::class, 'about']);

Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/Contact.html', [PageController::class, 'contact']);

Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/Gallery.html', [PageController::class, 'gallery']);

Route::get('/feestructure', [PageController::class, 'feestructure'])->name('feestructure');
Route::get('/feestructure.html', [PageController::class, 'feestructure']);

Route::get('/sitemap', [PageController::class, 'sitemap'])->name('sitemap');
Route::get('/sitemap.html', [PageController::class, 'sitemap']);

// Blog Pages
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog.html', [BlogController::class, 'index']);
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');

// Course Pages
Route::get('/courses/ac-repairing', [CourseController::class, 'acRepairing'])->name('courses.ac');
Route::get('/acreparing.html', [CourseController::class, 'acRepairing']);

Route::get('/courses/washing-machine', [CourseController::class, 'washingMachine'])->name('courses.washing');
Route::get('/washingmachine.html', [CourseController::class, 'washingMachine']);

Route::get('/courses/fridge-repairing', [CourseController::class, 'fridgeRepairing'])->name('courses.fridge');
Route::get('/fridgereparing.html', [CourseController::class, 'fridgeRepairing']);

Route::get('/courses/mobile-repairing', [CourseController::class, 'mobileRepairing'])->name('courses.mobile');
Route::get('/mobilereparing.html', [CourseController::class, 'mobileRepairing']);

Route::get('/courses/laptop-repairing', [CourseController::class, 'laptopRepairing'])->name('courses.laptop');
Route::get('/laptoprepairing.html', [CourseController::class, 'laptopRepairing']);

// Admin Web Routes
Route::get('/admin', [AdminController::class, 'loginView']);
Route::get('/admin/login', [AdminController::class, 'loginView'])->name('admin.login');
Route::get('/admin/frontend/login.html', function() { return redirect()->route('admin.login'); });

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/frontend/index.html', function() { return redirect()->route('admin.dashboard'); });

Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::post('/admin/blogs', [AdminController::class, 'storeBlog'])->name('admin.blogs.store');
Route::post('/admin/blogs/delete/{id}', [AdminController::class, 'deleteBlog'])->name('admin.blogs.delete');

Route::post('/admin/sliders', [AdminController::class, 'storeSlider'])->name('admin.sliders.store');
Route::post('/admin/sliders/delete/{id}', [AdminController::class, 'deleteSlider'])->name('admin.sliders.delete');

Route::post('/admin/fees', [AdminController::class, 'storeFee'])->name('admin.fees.store');
Route::post('/admin/fees/delete/{id}', [AdminController::class, 'deleteFee'])->name('admin.fees.delete');

Route::post('/admin/galleries', [AdminController::class, 'storeGallery'])->name('admin.galleries.store');
Route::post('/admin/galleries/delete/{id}', [AdminController::class, 'deleteGallery'])->name('admin.galleries.delete');
