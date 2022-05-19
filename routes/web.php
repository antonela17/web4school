<?php

use App\Http\Controller\User1Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
//Route:: resourse('users',User1Controller::class);

Auth::routes();

Route::get('change-password', [App\Http\Controllers\Auth\ChangePasswordController::class,'index']);
Route::post('change-password', [App\Http\Controllers\Auth\ChangePasswordController::class,'store'])->name('change.password');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test/',function (){
    return view('createTable');
});

Route::get('profile',function (){
    return view('profile.index');
})->name('profile');

Route::get('profile/edit',function (){
    return view('profile.edit');
})->name('profile.edit');
Route::post('profile/update',[\App\Http\Controllers\HomeController::class,'profileUpdate'])->name('profile.update');

Route::get('profile/changepassword',function (){
    return view('profile.changepassword');
})->name('profile.changepassword');

Route::get('read',[UserController::class,'read'])->name('read')->middleware('admin_only');
Route::get('create-user',[UserController::class,'createUserView'])->middleware('admin_only');
Route::post('create',[UserController::class,'create'])->middleware('admin_only')->name('create');
Route::get('edit',[UserController::class,'editUser'])->middleware('admin_only')->name('prove');
Route::post('/edit',[UserController::class,'update'])->middleware('admin_only')->name('edit');
Route::post('/delete',[UserController::class,'delete'])->middleware('admin_only')->name('delete');
Route::get('/search',[UserController::class,'search'])->name('search');
