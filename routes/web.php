<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Models\News;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ForgotPasswordController;




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

Route::get('/', function () {
    return view('index');
})->name('index');;

Route::get('properties', function () {
    return view('properties'); 
})->name('properties');

Route::get('loginPage', function () {
    return view('login'); 
})->name('loginPage');

Route::get('homePageUsers', function () {
    return view('homePageUsers'); 
})->name('homePageUsers');

Route::get('userAccount', function () {
    return view('userAccount'); 
})->name('userAccount');

Route::get('/about', function () {
    return view('about'); 
})->name('about');

Route::get('register', [RegistrationController::class, 'create'])->name('register');
Route::post('register', [RegistrationController::class, 'store']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//Route::get('/newsPage', function () {
//   return view('newsPage'); 
//})->name('newsPage');

Route::get('/newsPage', [NewsController::class, 'index'])->name('newsPage');
// This line will generate all the necessary CRUD routes for news items
Route::resource('news', NewsController::class)->except(['show']);
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');


Route::get('/news/{id}/news', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');


Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

//FAQ 
Route::get('/faqPage', [FaqController::class, 'index'])->name('faqPage');

// Route for creating FAQ questions
Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store');

// Route for creating FAQ categories
Route::get('/faq-categories/create', [FaqCategoryController::class, 'create'])->name('faq-categories.create');
Route::post('/faq-categories', [FaqCategoryController::class, 'store'])->name('faq-categories.store');


Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');
// Route for deleting FAQ categories
Route::delete('/faq-categories/{faq_category}', [FaqCategoryController::class, 'destroy'])->name('faq-categories.destroy');



Route::resource('faq-categories', FaqCategoryController::class);
Route::resource('faqs', FaqController::class);

//Inbox user and admin 
// User Inbox
Route::middleware(['auth'])->group(function () {
    Route::get('/inbox', [UserController::class, 'inbox'])->name('user.inbox');
    Route::get('/chat', [UserController::class, 'chat'])->name('user.chat');
    Route::post('/chat/send', [UserController::class, 'sendMessage'])->name('user.send.message');
});

// Admin Inbox
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/inbox', [AdminController::class, 'inbox'])->name('admin.inbox');
    Route::get('/admin/chat/{user_id}', [AdminController::class, 'chat'])->name('admin.chat');
    Route::post('/admin/chat/{user_id}/send', [AdminController::class, 'sendMessage'])->name('admin.send.message');
});

// Contact form
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'sendContactMessage'])->name('contact.send');

// Route for account information page (view and update)
Route::middleware(['auth'])->group(function () {
    Route::get('/account', [UserController::class, 'accountInfo'])->name('account.info');
    Route::post('/account', [UserController::class, 'updateAccountInfo'])->name('account.update');
});

//Logout route 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Manage users page 
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage.users');
    Route::post('/admin/update-user/{userId}', [AdminController::class, 'updateUser'])->name('admin.update.user');
    Route::delete('/admin/delete-user/{userId}', [AdminController::class, 'deleteUser'])->name('admin.delete.user');
});

Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset')->middleware('guest');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('password/reset', [ForgotPasswordController::class, 'changePassword'])->name('password.update');

Route::get('/forgotPassword', [ForgotPasswordController::class, 'showResetForm'])->name('forgot-password');

//modify password from dropdown 

Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset')->middleware('guest');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('password/reset', [ForgotPasswordController::class, 'changePassword'])->name('password.update');

Route::get('/forgotPassword', [ForgotPasswordController::class, 'showResetForm'])->name('forgot-password');
Route::match(['get', 'post'], 'password/reset', [ForgotPasswordController::class, 'showResetForm'])->name('forgot-password');



