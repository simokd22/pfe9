<?php
use App\Http\Controllers\SearchController;
use App\Http\Controllers\NewsinfoController;

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
        Route::get('admin/dashboard', function (){return view ('admin.dashboard');})
    ->name('admindashboard');
    
    Route::resource('news' , NewsinfoController::class)->names('news');


});

//user
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified','authuser'
])->group(function () {
    Route::get('user/search', function () {
        return view('user.search');
    })->name('usersearch');

    Route::post('/user/search', [SearchController::class ,'search'])->name('user.search');
    
    Route::get('/User/SearchResults', [SearchController::class ,'results'])->name('user.SearchResults');
    Route::get('/user/article/{news}/{id}', [SearchController::class,'show'])->name('user.article');
});

