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
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : view('welcome');
})->name('landing');

// Di dalam middleware auth, tambahkan:
Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::get('/{profile}/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/{profile}', [ProfileController::class, 'update'])->name('update');
    Route::put('/password', [AuthController::class, 'updatePassword'])->name('password.update');
});

Route::resource('report', ReportController::class);

Route::resource('schedule', ScheduleController::class);

// Route Berita
Route::resource('berita', BeritaController::class);

// Program routes
Route::resource('program', ProgramController::class);

Route::resource('pengumuman', AnnouncementController::class);
Route::get('/messages', [MessageController::class, 'index'])->name('messages');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::get('/messages/{id}', [MessageController::class, 'show'])->name('messages.show');
Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
Route::post('/messages/{id}/read', [MessageController::class, 'markAsRead'])->name('messages.read');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn () => view('admin.dashboard'));
});

Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', fn () => view('teacher.dashboard'));
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', fn () => view('student.dashboard'));
});


// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'show'])
        ->name('register');
    Route::post('/register', [RegisterController::class, 'store'])
        ->name('register.post');
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
    //Route::get('/pengumuman', [HomeController::class, 'announcement'])->name('pengumuman');
    //Route::get('/program', [HomeController::class, 'program'])->name('program');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
   // Route::get('/berita', [HomeController::class, 'news'])->name('berita');
    Route::get('/akademik', [HomeController::class, 'academic'])->name('akademik');
    
    // Profile
    //Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    
    // NAVBAR MENU ROUTES (TAMBAHAN BARU SESUAI GAMBAR)
    //Route::get('/schedule', [HomeController::class, 'schedule'])->name('schedule');
    //Route::get('/reports', [HomeController::class, 'reports'])->name('reports');
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

    // Students
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::resource('students', StudentController::class);

    // Route untuk Admin Menu
    Route::get('/library', function () {
    return view('library'); // Ini akan mencari file library.blade.php
    })->name('library.index');
    Route::get('/library', [LibraryController::class, 'index'])->name('library.index');
    Route::post('/library', [LibraryController::class, 'store'])->name('library.store');
    Route::delete('/library/{id}', [LibraryController::class, 'destroy'])->name('library.destroy');
    Route::put('/library/{id}', [LibraryController::class, 'update'])->name('library.update');

    Route::get('/routine', function () {
    return view('routine'); // Ini akan mencari file routine.blade.php
    })->name('routine.index');

    Route::get('/exam', function () {
    return view('exam'); // Ini akan mencari file exam.blade.php
    })->name('exam.index');
});