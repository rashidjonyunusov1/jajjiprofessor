<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\WinController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\NumberController;
use App\Http\Controllers\Admin\HumanController;

Route::get('/', [PagesController::class, 'welcome'])->name('welcome');

// Route::get('layouts.main', [PagesController::class, 'main'])->name('main');

Route::get('class', [PagesController::class, 'class'])->name('class');

Route::get('team', [PagesController::class, 'team'])->name('team');

Route::get('gallery', [PagesController::class, 'gallery'])->name('gallery');

Route::get('achievements', [PagesController::class, 'achievements'])->name('achievements');

Route::get('article', [PagesController::class, 'article'])->name('article');

Route::get('blog', [PagesController::class, 'blog'])->name('blog');

Route::get('footer', [PagesController::class, 'footer'])->name('footer');

// Admin routes



Route::prefix('admin/')->name('admin.')->middleware('auth')->group(function(){
    Route::get('dashboard', function(){
        return view('admin.layouts.dashboard');
    })->name('dashboard');

    
    Route::resource('infos', InfoController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('wins', WinController::class);
    Route::resource('photos', PhotoController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('complaints', ComplaintController::class);
    Route::resource('numbers', NumberController::class);
    Route::resource('humans', HumanController::class);

});
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
