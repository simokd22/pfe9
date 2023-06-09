<?php
use App\Http\Controllers\Userinfo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsinfoController;

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
Route::post('/get-sites-categories', [SearchController::class, 'getSitesCategories'])->name('get-sites-categories');
Route::get('/', function () {
        return view('auth.login');
});

//admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified','authadmin'
])->group(function () {
    //admindashboard
        //Route::get('admin/dashboard', function (){return view ('admin.dashboard');})->name('admindashboard');
    //Route::get('admin/dashboard', [Userinfo::class ,'index'])->name('admindashboard');
    Route::resource('Userinfo' , Userinfo::class)->names('Userinfo');
    Route::resource('news' , NewsinfoController::class)->names('news');
    Route::resource('Categories' , CategoryController::class)->names('Categories');
    Route::resource('langues' , LangueController::class)->names('langues');
    Route::get('/admin/search', [SearchController::class ,'index'])->name('admin.search');
    Route::post('/admin/search', [SearchController::class ,'search'])->name('admin.search-post');
    Route::get('/admin/SearchResults', [SearchController::class ,'results'])->name('admin.SearchResults');
    Route::get('/admin/article/{news}/{id}', [SearchController::class,'show'])->name('admin.article');
    Route::get('admin/profile', function () {
        return view('profile.show');
    })->name('profile_admin');
    //Route::post('news/guessScrapElements',[SearchController::class ,'guessScrapElements'])->name('guessScrapingElements');
});

//user
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified','authuser'
])->group(function () {
    Route::get('/user/search', [SearchController::class ,'index'])->name('user.search');
    Route::post('/user/search', [SearchController::class ,'search'])->name('user.search-post');
    //Route::get('/user/get-sites', [SearchController::class, 'getSites'])->name('user.get-sites');
    Route::get('/user/SearchResults', [SearchController::class ,'results'])->name('user.SearchResults');
    Route::get('/user/article/{news}/{id}', [SearchController::class,'show'])->name('user.article');
     Route::get('user/profile', function () {
        return view('profile.show');
    })->name('profile_user');

    Route::get('user/about', function () {
        return view('user.about');
    })->name('about');

    Route::get('user/termsOfService', function () {
        return view('user.termsOfService');
    })->name('terms');
    
});