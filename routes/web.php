<?php

use Illuminate\Support\Facades\Route;
 
// Route::get('s', function (){
//     \Illuminate\Support\Facades\Artisan::call('storage:link');
//     echo 'storage:link ok';
// });

Route::get('/register-user', [App\Http\Controllers\UserController::class,'registerUser'] );
Route::post('/post-register-user', [App\Http\Controllers\UserController::class,'postRegisterUser'] );
Route::get('/login-user', [App\Http\Controllers\UserController::class,'loginUser'] );
Route::post('/post-login-user', [App\Http\Controllers\UserController::class,'postLoginUser'] );

Route::get('/profile-user', [App\Http\Controllers\UserController::class,'profileUser'] )->middleware('checkLoginUser');
Route::get('/logout-user', [App\Http\Controllers\UserController::class,'logoutUser'] );


//Route::get('/register-admin', [App\Http\Controllers\AdminController::class,'registerAdmin'] );
//Route::post('/post-register-admin', [App\Http\Controllers\AdminController::class,'postRegisterAdmin'] );
Route::get('/login-admin', [App\Http\Controllers\AdminController::class,'loginAdmin'] );
Route::post('/post-login-admin', [App\Http\Controllers\AdminController::class,'postLoginAdmin'] );

Route::get('/profile-admin', [App\Http\Controllers\AdminController::class,'profileAdmin'])->middleware('checkLoginAdmin');
Route::get('/logout-admin', [App\Http\Controllers\AdminController::class,'logoutAdmin'])->middleware('checkLoginAdmin');
Route::get('/quan-ly-user', [App\Http\Controllers\AdminController::class,'quanLyUser'])->middleware('checkLoginAdmin');
Route::get('/quan-ly-bai-viet', [App\Http\Controllers\AdminController::class,'quanLyBaiViet'])->middleware('checkLoginAdmin');
Route::get('/quan-ly-xoa-bai-viet/{id}', [App\Http\Controllers\AdminController::class,'quanLyXoaBaiViet'])->middleware('checkLoginAdmin');
Route::get('/delete-user/{id}', [App\Http\Controllers\AdminController::class,'deleteUser'])->middleware('checkLoginAdmin');



Route::get('/', [App\Http\Controllers\MainController::class,'trangchu'] );
Route::get('/them-bai-viet', [App\Http\Controllers\MainController::class,'themBaiViet'])->middleware('checkLoginUser');
Route::post('/post-them-bai-viet', [App\Http\Controllers\MainController::class,'postThemBaiViet'])->middleware('checkLoginUser');
Route::get('/sua-bai-viet/{id}', [App\Http\Controllers\BaiVietController::class,'suaBaiViet'])->middleware('checkLoginUser');
Route::post('/post-sua-bai-viet', [App\Http\Controllers\BaiVietController::class,'postSuaBaiViet'])->middleware('checkLoginUser');


Route::get('/cap-nhat-user', [App\Http\Controllers\UserController::class,'capNhatUser'])->middleware('checkLoginUser');
Route::post('/post-cap-nhat-user', [App\Http\Controllers\UserController::class,'postCapNhatUser'])->middleware('checkLoginUser');

Route::get('/mat-khau-user', [App\Http\Controllers\UserController::class,'matKhauUser'])->middleware('checkLoginUser');
Route::post('/post-mat-khau-user', [App\Http\Controllers\UserController::class,'postMatKhauUser'])->middleware('checkLoginUser');

Route::get('/xem-bai-viet/{id}', [App\Http\Controllers\MainController::class,'xemBaiViet']);
Route::post('/post-binh-luan', [App\Http\Controllers\MainController::class,'postBinhLuan'])->middleware('checkLoginUser');
Route::get('/mat-khau-user', [App\Http\Controllers\UserController::class,'matKhauUser'])->middleware('checkLoginUser');
Route::get('/mat-khau-user', [App\Http\Controllers\UserController::class,'matKhauUser'])->middleware('checkLoginUser');
Route::get('/xoa-bai-viet/{id}', [App\Http\Controllers\UserController::class,'xoaBaiViet'])->middleware('checkLoginUser');

Route::get('/like-bai-viet/{id}', [App\Http\Controllers\LikeController::class,'likeBaiViet'])->middleware('checkLoginUser');
Route::get('/xem-profile/{id}', [App\Http\Controllers\MainController::class,'xemProfile']);
Route::get('/moi-nguoi', [App\Http\Controllers\LikeController::class,'moiNguoi'])->middleware('checkLoginUser');

Route::get('/following', [App\Http\Controllers\LikeController::class,'following'])->middleware('checkLoginUser');
Route::get('/follow/{id}', [App\Http\Controllers\LikeController::class,'follow'])->middleware('checkLoginUser');
Route::get('/unfollow/{id}', [App\Http\Controllers\LikeController::class,'unfollow']);

Route::get('/delete-comment/{id}', [App\Http\Controllers\BaiVietController::class,'deleteComment'])->middleware('checkLoginUser');


Route::view('video', 'home.video');

