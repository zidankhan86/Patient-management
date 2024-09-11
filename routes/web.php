<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\frontend\AboutUsController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\HeroBannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SocialShareButtonsController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;




//Landing
Route::get('/doctor',[DoctorController::class,'doctor'])->name('doctor');
Route::get('/details/{id}',[DoctorController::class,'doctorDetails'])->name('details');
Route::get('/about',[AboutUsController::class,'about'])->name('about');

Route::get('/',[FrontendHomeController::class,'home'])->name('home');


//ContactUs
Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::post('/contact-form',[ContactController::class,'contactForm'])->name('contact.form.store');
Route::get('/login-frontend', [LoginController::class, 'showLoginFormFrontend'])->name('login.frontend');
//profile
Route::get('/profile',[ProfileController::class,'profile'])->name('profile');
//Auth
Route::controller(LoginController::class)->group(function(){
    Route::get('/login','showLoginForm')->name('login');
    Route::post('/login','loginProcess')->name('login.submit');
    Route::get('/logout','logout')->name('logout');
    Route::get('/registration', 'registration')->name('registration');
    Route::post('/registration', 'registrationStore')->name('registration.submit');
});


Route::group(['middleware' => 'customerAuth'], function () {
   

});

//middleware auth and admin
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {

Route::get('/',[HomeController::class,'dashboard'])->name('dashboard');

// Category Routes
Route::get('/category-form', [CategoryController::class, 'categoryForm'])->name('category.form');
Route::post('/category-store', [CategoryController::class, 'categoryStore'])->name('category.store');
Route::get('/category-list', [CategoryController::class, 'categoryList'])->name('category.list');
Route::get('/category-edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
Route::post('/category-update/{id}', [CategoryController::class, 'categorupdate'])->name('category.update');
Route::get('/category-delete/{id}', [CategoryController::class, 'categordelete'])->name('category.delete');
// Product Routes



Route::controller(ReportController::class)->group(function(){

    Route::get('/report','report')->name('report');
    Route::get('/report/search','reportSearch')->name('order.report.search');
});});



