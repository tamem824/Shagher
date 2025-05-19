<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\JobController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserStatus;
use App\Http\Middleware\Company;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', [FrontendController::class, 'index']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->name('admin.')->middleware(['auth', CheckUserStatus::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', App\Http\Controllers\TagController::class);
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
    Route::get('companies', [AdminController::class, 'index'])->name('companies.index');
    Route::get('companies/{company}', [AdminController::class, 'show'])->name('companies.show');
    Route::patch('companies/{company}/approve', [AdminController::class, 'approve'])->name('companies.approve');
    Route::patch('companies/{company}/reject', [AdminController::class, 'reject'])->name('companies.reject');


});


Route::get('home', [FrontendController::class, 'index'])->name('home');
Route::get('jobs', [FrontendController::class, 'jobIndex'])->name('jobs');
Route::get('/jobs/{id}', [FrontendController::class, 'jobShow'])->name('jobs.show');
Route::get('categories', [FrontendController::class, 'categoriesIndex'])->name('categories');
Route::get('categories/{id}', [FrontendController::class, 'categoriesShow'])->name('categories.show');
Route::get('companies/details', [FrontendController::class, 'companyDetails'])->name('companies.details');
Route::get('jobs/create', [FrontendController::class, 'createJob'])->name('jobs.create');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('support', [FrontendController::class, 'support'])->name('support');
Route::get('register', [FrontendController::class, 'register'])->name('register');
Route::get('login', [FrontendController::class, 'login'])->name('login');
Route::get('privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('terms', [FrontendController::class, 'terms'])->name('terms');
Route::get('shortcodes/{shortcode}', [FrontendController::class, 'shortcode'])->name('shortcodes');
Route::get('blog', [FrontendController::class, 'blogCategory'])->name('blog.category');
Route::get('blog/single/{id}', [FrontendController::class, 'blogSingle'])->name('blog.single');
Route::get('/posts', [FrontendController::class, 'postsIndex'])->name('posts.index');
Route::get('/posts/{post}', [FrontendController::class, 'postShow'])->name('posts.show');
Route::post('/posts/{post}/comments', [FrontendController::class, 'storeComment'])->name('comments.store');
Route::get('/posts/{post}/comments', [FrontendController::class, 'comments'])->name('comments.index');
Route::post('/comments/{comment}/reply', [FrontendController::class, 'storeReply'])->name('comments.reply');


Route::prefix('company')->name('company.')->middleware(['auth', CheckUserStatus::class])->group(function () {
    Route::get('profile', [CompanyController::class, 'profile'])->name('profile');
    Route::get('profile.edit', [CompanyController::class, 'edit'])->name('profile.edit');
    Route::put('profile.update', [CompanyController::class, 'update'])->name('profile.update');
//    Route::get('jobs{job}', [CompanyController::class, 'show'])->name('jobs.show');
    Route::get('jobs.create', [CompanyController::class, 'createJob'])->name('jobs.create');
    Route::post('jobs.create', [CompanyController::class, 'storeJob'])->name('jobs.store');
    Route::get('jobs.{job}/edit', [CompanyController::class, 'editJob'])->name('jobs.edit');
    Route::put('jobs.{job}', [CompanyController::class, 'updateJob'])->name('jobs.update');
    Route::delete('.jobs.{job}', [CompanyController::class, 'destroy'])->name('jobs.destroy');
});


Route::prefix('user')->middleware('auth')->name('user.')->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

    // تعديل البروفايل (عرض + تحديث)
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');

    // إدارة ملف الفريلانسير (إنشاء، عرض، تعديل)
    Route::get('/freelancer/create', [UserController::class, 'create'])->name('freelancer.create');
    Route::post('/freelancer', [UserController::class, 'store'])->name('freelancer.store');
    Route::get('/freelancer/edit', [UserController::class, 'edit'])->name('freelancer.edit');
    Route::put('/freelancer', [UserController::class, 'update'])->name('freelancer.update');

    // عرض الوظائف التي قدّم عليها المستخدم
    Route::get('/applications', [UserController::class, 'index'])->name('applications.index');


    // Route::get('/settings', ...);
    // Route::post('/logout', ...);
});
