<?php

use App\Http\Controllers\adminPanel;
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
    return redirect('/login');
    
});

// Route for setting locales
Route::get('set-locale/{locale}', function ($locale) {
    Session()->put('locale', $locale);
    return redirect()->back();
})->middleware(ChangeLocale::class)->name('locale.setting');

// Routes for pages
Route::get('/dashboard', [dashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'notDeactivated'])->name('dashboard');

Route::delete('/dashboard/poDe/{id}', [dashboardController::class, 'destroyPost'])
    ->middleware(['auth', 'verified', 'notDeactivated'])->name('dashboard-destroyPost'); 

Route::get('/explore', [ExploreController::class, 'index'])
    ->middleware(['auth', 'verified', 'notDeactivated'])->name('explore');

Route::get('/explore/{id}', [ExploreController::class, 'viewPost'])
    ->middleware(['auth', 'verified', 'notDeactivated']);

Route::get('/add', function () {
    return view('add');
})->middleware(['auth', 'verified', 'notDeactivated'])->name('add');

Route::get('/aboutus', function () {
    return view('aboutus');
})->middleware(['auth', 'verified', 'notDeactivated'])->name('aboutus');

Route::get('/map', [mapController::class, 'getPins'])->name('map');

Route::get('/admin-panel', [adminPanel::class, 'index'])
    ->middleware('role:admin')->name('admin-panel');

Route::delete('/admin-panel/usDe/{id}', [adminPanel::class, 'deactivate'])
    ->middleware('role:admin')->name('admin-panel-deactivateUser');  

Route::delete('/admin-panel/poDe/{id}', [adminPanel::class, 'destroyPost'])
    ->middleware('role:admin')->name('admin-panel-destroyPost');  


Route::post('upload-rating', [UploadController::class, 'insert'])
    ->middleware(['auth', 'verified', 'notDeactivated'])->name('post');
//  /\  Jakby się upload zepsuł to tu wywalić middleware! /\ 



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



