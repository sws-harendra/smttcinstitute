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
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// SEO Redirects for Old HTML Pages
Route::redirect('/acreparing.html', '/courses/ac-repairing', 301);
Route::redirect('/washingmachine.html', '/courses/washing-machine', 301);
Route::redirect('/fridgerepairing.html', '/courses/fridge-repairing', 301);
Route::redirect('/mobilereparing.html', '/courses/mobile-repairing', 301);
Route::redirect('/laptoprepairing.html', '/courses/laptop-repairing', 301);

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
Route::post('/admin/blogs/upload-image', [AdminController::class, 'uploadImage'])->name('admin.blogs.uploadImage');
Route::post('/admin/blogs/update/{id}', [AdminController::class, 'updateBlog'])->name('admin.blogs.update');
Route::post('/admin/blogs/delete/{id}', [AdminController::class, 'deleteBlog'])->name('admin.blogs.delete');

Route::post('/admin/sliders', [AdminController::class, 'storeSlider'])->name('admin.sliders.store');
Route::post('/admin/sliders/delete/{id}', [AdminController::class, 'deleteSlider'])->name('admin.sliders.delete');

Route::post('/admin/fees', [AdminController::class, 'storeFee'])->name('admin.fees.store');
Route::post('/admin/fees/update/{id}', [AdminController::class, 'updateFee'])->name('admin.fees.update');
Route::post('/admin/fees/delete/{id}', [AdminController::class, 'deleteFee'])->name('admin.fees.delete');

Route::post('/admin/galleries', [AdminController::class, 'storeGallery'])->name('admin.galleries.store');
Route::post('/admin/galleries/update/{id}', [AdminController::class, 'updateGallery'])->name('admin.galleries.update');
Route::post('/admin/galleries/delete/{id}', [AdminController::class, 'deleteGallery'])->name('admin.galleries.delete');

Route::post('/admin/before-after', [AdminController::class, 'storeBeforeAfter'])->name('admin.before_after.store');
Route::post('/admin/before-after/update/{id}', [AdminController::class, 'updateBeforeAfter'])->name('admin.before_after.update');
Route::post('/admin/before-after/delete/{id}', [AdminController::class, 'deleteBeforeAfter'])->name('admin.before_after.delete');
Route::post('/api/before-after/like/{id}', [PageController::class, 'likeBeforeAfter'])->name('before_after.like');

Route::post('/admin/successful-students', [AdminController::class, 'storeSuccessfulStudent'])->name('admin.students.store');
Route::post('/admin/successful-students/update/{id}', [AdminController::class, 'updateSuccessfulStudent'])->name('admin.students.update');
Route::post('/admin/successful-students/delete/{id}', [AdminController::class, 'deleteSuccessfulStudent'])->name('admin.students.delete');

Route::post('/admin/story-videos', [AdminController::class, 'storeSuccessStoryVideo'])->name('admin.story_videos.store');
Route::post('/admin/story-videos/update/{id}', [AdminController::class, 'updateSuccessStoryVideo'])->name('admin.story_videos.update');
Route::post('/admin/story-videos/delete/{id}', [AdminController::class, 'deleteSuccessStoryVideo'])->name('admin.story_videos.delete');

Route::post('/admin/certificates', [AdminController::class, 'storeCertificate'])->name('admin.certificates.store');
Route::post('/admin/certificates/update/{id}', [AdminController::class, 'updateCertificate'])->name('admin.certificates.update');
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

Route::get('/id-card/{id}', function($id) {
    $admission = \App\Models\Admission::where('enrollment_no', $id)->first();
    $certificate = \App\Models\Certificate::where('regd_no', $id)->first();

    if (!$admission && !$certificate) {
        $admission = \App\Models\Admission::where('id', $id)->orWhere('username', $id)->first();
    }

    if (!$admission && !$certificate) {
        abort(404, 'Student Identity Card not found for: ' . $id);
    }

    $name = $admission ? $admission->name : $certificate->name;
    $rawFather = $admission ? $admission->father_name : ($certificate ? $certificate->father_name : null);
    $fatherName = ($rawFather && strtolower(trim($rawFather)) !== 'null' && strtolower(trim($rawFather)) !== 'nill' && strtolower(trim($rawFather)) !== '') ? strtoupper($rawFather) : '—';
    
    $dob = $admission ? $admission->dob : ($certificate ? $certificate->dob : null);
    $course = $admission ? $admission->course : ($certificate ? $certificate->course : 'Technical Training');
    $mobile = $admission ? $admission->mobile_no : '—';
    $email = $admission ? $admission->email : '—';
    $enrollment_no = $admission ? $admission->enrollment_no : $certificate->regd_no;
    $photo = ($admission && $admission->photo) ? $admission->photo : ($certificate ? $certificate->photo : null);
    $address = $admission ? ($admission->address . ', ' . $admission->district . ', ' . $admission->state) : ($certificate->location ?? 'Patna, Bihar');
    $validFrom = $certificate ? ($certificate->from_date ? \Carbon\Carbon::parse($certificate->from_date)->format('M Y') : null) : ($admission ? \Carbon\Carbon::parse($admission->created_at)->format('M Y') : date('M Y'));
    $validTo = $certificate ? ($certificate->to_date ? \Carbon\Carbon::parse($certificate->to_date)->addYears(2)->format('M Y') : null) : date('M Y', strtotime('+2 years'));

    $student = (object)[
        'id' => $admission ? $admission->id : ($certificate ? $certificate->id : 1),
        'name' => $name,
        'father_name' => $fatherName,
        'dob' => $dob,
        'course' => $course,
        'mobile_no' => $mobile,
        'email' => $email,
        'enrollment_no' => $enrollment_no,
        'photo' => $photo,
        'address' => $address,
        'valid_from' => $validFrom,
        'valid_to' => $validTo,
        'admission' => $admission,
        'certificate' => $certificate,
    ];

    return view('idcard', compact('student'));
})->name('idcard.view');

Route::post('/id-card/upload-photo/{id}', [AdminController::class, 'uploadIdCardPhoto'])->name('idcard.uploadPhoto');

