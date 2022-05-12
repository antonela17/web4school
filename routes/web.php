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
    return view('newChangePassword');
});
Route::get('read',[UserController::class,'read'])->name('read');
Route::get('create-user',[UserController::class,'createUserView']);
Route::post('create',[UserController::class,'create'])->name('create');
Route::get('edit',[UserController::class,'editUser'])->name('prove');
Route::post('/edit',[UserController::class,'update'])->name('edit');
Route::post('/delete',[UserController::class,'delete'])->name('delete');
