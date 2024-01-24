<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\mapController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\rolesController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ChangeLocale;


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

// Route for setting locales
Route::get('set-locale/{locale}', function ($locale) {
    Session()->put('locale', $locale);
    return redirect()->back();
})->middleware(ChangeLocale::class)->name('locale.setting');

// // Routes for pages
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Routes for pages
Route::get('/dashboard', [dashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/explore', [ExploreController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('explore');

Route::get('/add', function () {
    return view('add');
})->middleware(['auth', 'verified'])->name('add');

// Route::post('/images/upload', [ImageController::class, 'store'])
//     ->middleware(['auth', 'verified'])->name('uploadImage');

Route::get('/aboutus', function () {
    return view('aboutus');
})->middleware(['auth', 'verified'])->name('aboutus');

Route::get('/map', [mapController::class, 'getPins'])->name('map');
// Route::get('/map', [mapController::class, 'getPins'])->middleware(['auth', 'verified'])->name('map');

Route::get('/admin-panel', function () {
    return view('admin-panel');
})->middleware('role:admin')->name('admin-panel');

Route::get('/moderator-panel', function () {
    return view('moderator-panel');
})->middleware('role:moderator')->name('moderator-panel');

Route::post('upload-rating', [UploadController::class, 'insert'])
    ->middleware(['auth', 'verified'])->name('post');
//  /\  Jakby się upload zepsuł to tu wywalić middleware! /\ 

// Route::get('/roles', function () {
//     return redirect()->back()->with('roles', [rolesController::class, 'getRoles']);
// });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



