<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

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

//Route::view('dashboard','dashboard')->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('dashboard',[DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::group(['middleware'=>['auth','role:admin']],function(){
        Route::get('admin',function(){ dd('Role: Admin'); })->name('admin');
    });
    Route::group(['middleware'=>['auth','role:editor']],function(){
        Route::get('editor',function(){ dd('Role: Editor'); })->name('editor');
    });
    Route::group(['middleware'=>['auth','role:author']],function(){
        Route::get('author',function(){ dd('Role: author'); })->name('author');
    });
    Route::group(['middleware'=>['auth','role:user']],function(){
        Route::get('user',function(){ dd('Role: user'); })->name('user');
    });
    Route::resource('book',BookController::class);
    Route::get('user_export',[UserController::class,'user_export'])->name('user_export');
    Route::post('user_import',[UserController::class,'user_import'])->name('user_import');
});

require __DIR__.'/auth.php';
