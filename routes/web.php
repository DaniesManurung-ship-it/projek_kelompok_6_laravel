<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MessageController;

Route::get('/messages', [MessageController::class, 'index'])->name('messages');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::get('/messages/{id}', [MessageController::class, 'show'])->name('messages.show');
Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
Route::post('/messages/{id}/read', [MessageController::class, 'markAsRead'])->name('messages.read');


Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');
Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');
Route::put('/reports/{report}', [ReportController::class, 'update'])->name('reports.update');



Route::middleware('auth')->group(function () {
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::put('/schedule/{schedule}', [ScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/schedule/{schedule}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
});


Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');


Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::get('/program_detail', [ProgramController::class, 'index'])->name('program.index');
Route::post('/program', [ProgramController::class, 'store'])->name('program.store');
Route::get('/program/{id}', [ProgramController::class, 'show'])->name('program.show');
Route::put('/program/{id}', [ProgramController::class, 'update'])->name('program.update');
Route::delete('/program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');

Route::get('/pengumuman', [AnnouncementController::class, 'index'])->name('pengumuman.index');
Route::post('/pengumuman', [AnnouncementController::class, 'store'])->name('pengumuman.store');
Route::get('/pengumuman/{id}', [AnnouncementController::class, 'show'])->name('pengumuman.show');



Route::middleware('auth')->group(function () {

    // CRUD Course (admin)
    Route::get('/courses', [CourseController::class, 'index']);
    Route::post('/courses', [CourseController::class, 'store']);
    Route::delete('/courses/{course}', [CourseController::class, 'destroy']);

    // ENROLL
    Route::post('/courses/{course}/enroll', [EnrollController::class, 'enroll'])
         ->name('courses.enroll');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});


// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'show'])->middleware('guest')->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');
});

// Protected Routes
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Main Pages (Existing - TIDAK DIKURANGI)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/biodata', [HomeController::class, 'biodata'])->name('biodata');
    Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
    Route::get('/program', [HomeController::class, 'program'])->name('program');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/berita', [HomeController::class, 'news'])->name('berita');
    Route::get('/akademik', [HomeController::class, 'academic'])->name('akademik');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    
    // NAVBAR MENU ROUTES (TAMBAHAN BARU SESUAI GAMBAR)
    Route::get('/schedule', [HomeController::class, 'schedule'])->name('schedule');
    Route::get('/reports', [HomeController::class, 'reports'])->name('reports');
    Route::get('/documents', [HomeController::class, 'documents'])->name('documents');
    Route::get('/messages', [HomeController::class, 'messages'])->name('messages');
    
    // Teacher Management
    Route::post('/biodata/store', [TeacherController::class, 'store'])->name('biodata.store');
    Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/teachers/list', [TeacherController::class, 'index'])->name('teachers.index');
    // Route untuk Lihat Detail
    Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');

    // Route untuk Edit
    Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');

    // Route untuk Hapus
    Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

    // Gallery Management
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Document Management
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents');
    Route::post('/documents/upload', [DocumentController::class, 'store'])->name('documents.store');
    Route::delete('/documents/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    Route::put('/documents/{id}', [DocumentController::class, 'update'])->name('documents.update');

    // Contact
    Route::post('/contact-send', [ContactController::class, 'store'])->name('contact.send');
    Route::get('/contact-list', [ContactController::class, 'index'])->name('contact.list');
});