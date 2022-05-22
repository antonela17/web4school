<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Mail\SendMailWithAttachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Auth::routes();

Route::get('change-password', [App\Http\Controllers\Auth\ChangePasswordController::class,'index']);
Route::post('change-password', [App\Http\Controllers\Auth\ChangePasswordController::class,'store'])->name('change.password');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('students',StudentController::class);
Route::resource('teachers',TeacherController::class);

Route::get('classes',[ClassController::class,'index'])->name('class.index');
Route::get("classes/edit/{id}", [ClassController::class,"indexEdit"])->name('class.editClass');
Route::post('classes/edit', [ClassController::class,"update"])->name("class.update");
Route::get('classes/new-students/{id}',[ClassController::class,'newStudents'])->name('class.addStudents');
Route::post('classes/store',[ClassController::class,'store'])->name('class.store');

Route::get('profile',function (){
    return view('profile.index');
})->name('profile');

Route::get('profile/edit',function (){
    return view('profile.edit');
})->name('profile.edit');
Route::post('profile/update',[HomeController::class,'profileUpdate'])->name('profile.update');

Route::get('profile/changepassword',function (){
    return view('profile.changepassword');
})->name('profile.changepassword');


Route::get('read',[UserController::class,'read'])->name('read')->middleware('admin_only');
Route::get('create-user',[UserController::class,'createUserView'])->middleware('admin_only');
Route::post('create',[UserController::class,'create'])->middleware('admin_only')->name('create');
Route::get('edit',[UserController::class,'editUser'])->middleware('admin_only')->name('prove');
Route::post('/edit',[UserController::class,'update'])->middleware('admin_only')->name('edit');
Route::post('/delete',[UserController::class,'delete'])->middleware('admin_only')->name('delete');
Route::get("/test",function (){
    return view("contact.contact");
});
Route::get('/contact',[ContactController::class,'create']);
Route::post("/contact",[ContactController::class,'send'])->name('contact.send');

Route::get("mail-with-attachment",[MailController::class,'create']);
Route::post("mail-with-attachment",[MailController::class, "sendAtttachment"])->name('contact.sendAtttachment');
