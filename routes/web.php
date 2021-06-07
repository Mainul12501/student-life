<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [\App\Http\Controllers\front\home\HomeController::class, 'index'])->name('/');
Route::get('/profile/{id}/{name}', [\App\Http\Controllers\front\home\HomeController::class, 'userProfile'])->name('user-profile');
Route::get('/gallery/{id}/{name}', [\App\Http\Controllers\front\home\HomeController::class, 'userGallery'])->name('user-gallery');
Route::get('/gallery', [\App\Http\Controllers\front\home\HomeController::class, 'galleryPage'])->name('gallery-page');
Route::get('/get-more-user-gallery-image/{id}', [\App\Http\Controllers\front\home\HomeController::class, 'getMoreImage'])->name('get-more-image');
Route::get('/get-more-gallery-image', [\App\Http\Controllers\front\home\HomeController::class, 'getMoreGalleryImage'])->name('get-more-gallery-image');
Route::get('/all-comments', [\App\Http\Controllers\front\home\HomeController::class, 'allComments'])->name('all-comments');

//teacher speech view
Route::get('/speech/{serial}/{name}', [\App\Http\Controllers\front\home\HomeController::class, 'teacherSpeech'])->name('teacher-speech');

Route::get('/dashboard', function () {
    return view('admin.master');
//    return view('admin.home.home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::multiauth('Admin', 'admin');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/role-mng', [\App\Http\Controllers\adminSection\PageOneController::class, 'role'])->name('role-mng');
    Route::get('/site-log', [\App\Http\Controllers\adminSection\PageOneController::class, 'siteLog'])->name('site-log');
    Route::get('/update-log', [\App\Http\Controllers\adminSection\PageOneController::class, 'updateLog'])->name('update-log');
});