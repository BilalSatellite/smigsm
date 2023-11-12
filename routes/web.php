<?php

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

Route::view('/', 'welcome');
// Route::get('dashboard', function () {
//     return redirect('/panel');
// })->name('dashboard');
// Route::get('filament.panel.pages.dashboard',function(){
//     filament.panel.pages.dashboard
// })
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');
// Route::get('/profile', function () {
//     return redirect('/panel/my-profile');
// })->middleware(['auth'])->name('profile');
Route::get('/dashboard', function () {
    return redirect('/panel');
})->middleware(['auth'])->name('dashboard');
require __DIR__ . '/auth.php';
