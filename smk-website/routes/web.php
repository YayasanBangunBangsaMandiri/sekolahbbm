<?php

use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MultiStepRegistrationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ApplicantDashboardController;
use App\Http\Controllers\Admin\LetterSettingController;
use App\Http\Controllers\Admin\RegistrationSettingController;
use App\Http\Controllers\Admin\AdminProfileController;
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

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send');

// Staff Detail Route
Route::get('/staff/{staff}', [StaffController::class, 'show'])->name('staff.show');

// Programs Routes
Route::get('/programs', [ProgramController::class, 'index'])->name('programs');
Route::get('/programs/{slug}', [ProgramController::class, 'show'])->name('programs.show');

// Projects Routes
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

// Activities Routes
Route::get('/activities', [ActivityController::class, 'index'])->name('activities');
Route::get('/activities/extracurricular', [ActivityController::class, 'index'])
    ->defaults('extracurricular', true)
    ->name('activities.extracurricular');
Route::get('/activities/{id}', [ActivityController::class, 'show'])->name('activities.show');

// Blog Routes
Route::get('/news', [PostController::class, 'index'])->name('news');
Route::get('/blog', [PostController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.show');
Route::get('/news/{slug}', [PostController::class, 'show'])->name('news.show');
Route::get('/category/{category}', [PostController::class, 'category'])->name('news.category');
Route::get('/tag/{tag}', [PostController::class, 'tag'])->name('news.tag');

// Gallery Routes
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');

// Generic Pages Route
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

// Multi-Step Registration Routes
Route::middleware(['registration.open'])->group(function () {
    Route::get('/registration', [MultiStepRegistrationController::class, 'createStep1'])->name('registration');
    Route::get('/registration/step1', [MultiStepRegistrationController::class, 'createStep1'])->name('registration.step1');
    Route::post('/registration/step1', [MultiStepRegistrationController::class, 'storeStep1'])->name('registration.post.step1');
    Route::get('/registration/step2', [MultiStepRegistrationController::class, 'createStep2'])->name('registration.step2');
    Route::post('/registration/step2', [MultiStepRegistrationController::class, 'storeStep2'])->name('registration.post.step2');
    Route::get('/registration/step3', [MultiStepRegistrationController::class, 'createStep3'])->name('registration.step3');
    Route::post('/registration/step3', [MultiStepRegistrationController::class, 'storeStep3'])->name('registration.post.step3');
    Route::get('/registration/completed', [MultiStepRegistrationController::class, 'completed'])->name('registration.completed');
});

// Applicant Dashboard Routes
Route::get('/application', function() {
    return redirect()->route('applicant.login');
})->name('application');
Route::get('/applicant/login', [ApplicantDashboardController::class, 'login'])->name('applicant.login');
Route::post('/applicant/authenticate', [ApplicantDashboardController::class, 'authenticate'])->name('applicant.authenticate');
Route::get('/applicant/dashboard', [ApplicantDashboardController::class, 'dashboard'])->name('applicant.dashboard');
Route::get('/applicant/logout', [ApplicantDashboardController::class, 'logout'])->name('applicant.logout');
Route::post('/applicant/update-profile', [ApplicantDashboardController::class, 'updateProfile'])->name('applicant.update-profile');
Route::get('/applicant/download-acceptance-letter', [ApplicantDashboardController::class, 'downloadAcceptanceLetter'])->name('applicant.download-acceptance-letter');

// Authentication Routes 
// (Generated by Laravel Breeze)
require __DIR__.'/auth.php';

// Dashboard Routes 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Redirect old profile routes to admin profile routes
    Route::get('/profile', function() {
        return redirect()->route('admin.profile.edit');
    })->name('profile.edit');
    
    Route::patch('/profile', function() {
        return redirect()->route('admin.profile.update');
    })->name('profile.update');
    
    Route::delete('/profile', function() {
        return redirect()->route('admin.profile.destroy');
    })->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile Management
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Users Management (Admin only)
    Route::resource('users', UserController::class);
    
    // Letter Settings
    Route::get('letter-settings', [LetterSettingController::class, 'edit'])->name('letter-settings.edit');
    Route::put('letter-settings', [LetterSettingController::class, 'update'])->name('letter-settings.update');
    
    // Content Management
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('majors', \App\Http\Controllers\Admin\MajorController::class);
    Route::resource('staff', \App\Http\Controllers\Admin\StaffController::class)->except('show');
    Route::resource('gallery', GalleryController::class)->except('show');
    Route::resource('programs', ProgramController::class)->except('show');
    Route::resource('projects', ProjectController::class)->except('show');
    Route::resource('activities', ActivityController::class)->except('show');
    Route::resource('pages', PageController::class)->except('show');
    
    // Media Management
    Route::post('media/upload', [MediaController::class, 'upload'])->name('media.upload');
    Route::delete('media/{id}', [MediaController::class, 'destroy'])->name('media.destroy');
    
    // Contact Submissions Management
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{id}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::patch('contacts/{id}/status', [AdminContactController::class, 'updateStatus'])->name('contacts.status');
    Route::delete('contacts/{id}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
    Route::get('contacts/export', [AdminContactController::class, 'export'])->name('contacts.export');
    
    // Registrations Management
    Route::get('registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    Route::get('registrations/{registration}', [RegistrationController::class, 'show'])->name('registrations.show');
    Route::patch('registrations/{registration}/status', [RegistrationController::class, 'updateStatus'])->name('registrations.update-status');
    Route::get('registrations/{registration}/download-letter', [RegistrationController::class, 'downloadAcceptanceLetter'])->name('registrations.download-letter');
    
    // Registration Settings
    Route::get('/registration-settings', [RegistrationSettingController::class, 'edit'])->name('registration-settings.edit');
    Route::put('/registration-settings', [RegistrationSettingController::class, 'update'])->name('registration-settings.update');
});
