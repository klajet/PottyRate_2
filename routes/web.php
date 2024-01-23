<?php

use App\Http\Controllers\ProfileController;
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


// Route::get('/set-locale/{locale}', function (string $locale) {
//     if (! in_array($locale, ['en', 'pl'])) {
//         abort(400);
//     }
 
//     App::setLocale($locale);
 
//     // ...
// })->middleware(ChangeLocale::class)->name('locale.setting');

Route::get('set-locale/{locale}', function ($locale) {
    // App::setLocale($locale);
    Session()->put('locale', $locale);
    return redirect()->back();
})->middleware(ChangeLocale::class)->name('locale.setting');

// Route::get('/lang/{locale}', function ($locale) {
//     session(['lang' => $locale]);
//     return redirect('/dashboard');

// })->name('lang.switch');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/explore', function () {
    return view('explore');
})->middleware(['auth', 'verified'])->name('explore');

Route::get('/add', function () {
    return view('add');
})->middleware(['auth', 'verified'])->name('add');

Route::get('/aboutus', function () {
    return view('aboutus');
})->middleware(['auth', 'verified'])->name('aboutus');

Route::get('/map', function () {
    return view('map');
})->middleware(['auth', 'verified'])->name('map');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



