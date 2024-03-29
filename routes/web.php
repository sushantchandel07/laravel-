<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationController ;
use App\Http\Controllers\UserController;




Route::get('/', function() { return view('home');});
Route::get('/signup', [UserController::class,'show']);
Route::post('/signup', [UserController::class,'signup']);
// Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::get('/login' ,  function(){return view('users.login');});
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/forgetpassword', [UserController::class , 'showForgetPassword']);
Route::post('/forgetpassword',[UserController::class , 'forgetpassword']);
Route::middleware('auth.user')->get('/profile' , [UserController::class, 'showProfile'])->name('profile');
Route::get('/edit' , function(){return view('pages/profileedit');});
Route::get('/album' , function(){return view('pages/album');})->name('album');
Route::get('/profile/edit', [UserController::class , 'editProfile'])->name('profile.edit');
Route::put('/profile/update', [UserController::class , 'updateProfile'])->name('profile.update');
Route::post('/profile', [UserController::class, 'Profile'])->name('profile.update');
// Route::get('/profile' , function(){return view('pages/profile');})->name('prpfile');



// Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');