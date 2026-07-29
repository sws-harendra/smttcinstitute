<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

// Public Homepage & Alias
Route::get('/', [HomeController::class, 'index'])->name('home');

// Public Pages
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');

Route::get('/admission', [PageController::class, 'admissionForm'])->name('admission');
Route::post('/student/register', [PageController::class, 'storeAdmission'])->name('student.register');

Route::get('/feestructure', [PageController::class, 'feestructure'])->name('feestructure');

Route::get('/sitemap', [PageController::class, 'sitemap'])->name('sitemap');

// Blog Pages
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');

// Course Pages
Route::get('/courses/ac-repairing', [CourseController::class, 'acRepairing'])->name('courses.ac');

Route::get('/courses/washing-machine', [CourseController::class, 'washingMachine'])->name('courses.washing');

Route::get('/courses/fridge-repairing', [CourseController::class, 'fridgeRepairing'])->name('courses.fridge');

Route::get('/courses/mobile-repairing', [CourseController::class, 'mobileRepairing'])->name('courses.mobile');

Route::get('/courses/laptop-repairing', [CourseController::class, 'laptopRepairing'])->name('courses.laptop');

// Admin Web Routes
Route::get('/admin', [AdminController::class, 'loginView']);
Route::get('/admin/login', [AdminController::class, 'loginView'])->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::post('/admin/blogs', [AdminController::class, 'storeBlog'])->name('admin.blogs.store');
Route::post('/admin/blogs/delete/{id}', [AdminController::class, 'deleteBlog'])->name('admin.blogs.delete');

Route::post('/admin/sliders', [AdminController::class, 'storeSlider'])->name('admin.sliders.store');
Route::post('/admin/sliders/delete/{id}', [AdminController::class, 'deleteSlider'])->name('admin.sliders.delete');

Route::post('/admin/fees', [AdminController::class, 'storeFee'])->name('admin.fees.store');
Route::post('/admin/fees/delete/{id}', [AdminController::class, 'deleteFee'])->name('admin.fees.delete');

Route::post('/admin/galleries', [AdminController::class, 'storeGallery'])->name('admin.galleries.store');
Route::post('/admin/galleries/delete/{id}', [AdminController::class, 'deleteGallery'])->name('admin.galleries.delete');

Route::post('/admin/certificates', [AdminController::class, 'storeCertificate'])->name('admin.certificates.store');
Route::post('/admin/certificates/delete/{id}', [AdminController::class, 'deleteCertificate'])->name('admin.certificates.delete');
Route::post('/admin/certificates/signatures', [AdminController::class, 'storeCertSignatures'])->name('admin.certificates.signatures');
Route::post('/admin/admissions/approve/{id}', [AdminController::class, 'approveAdmissionCertificate'])->name('admin.admissions.approve');

// Student Portal Routes
Route::get('/student/login', [StudentController::class, 'loginView'])->name('student.login');
Route::post('/student/login', [StudentController::class, 'login'])->name('student.login.submit');
Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
Route::post('/student/logout', [StudentController::class, 'logout'])->name('student.logout');

Route::get('/certificate/{regd_no}', function($regd_no) {
    $certificate = \App\Models\Certificate::where('regd_no', $regd_no)->firstOrFail();
    $student = (object)[
        'name' => $certificate->name,
        'certificate' => $certificate
    ];
    return view('certificate', compact('student'));
})->name('certificate.view');
