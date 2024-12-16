<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('session',function (Request $request) {
    $sessions = $request->session()->put("cart.products", [['id' => 'ABC', 'item' => 5]]);
    $sessions = $request->session()->push("cart.products", ['id' => 'XYZ', 'item' => 6]);
    $request->session()->put('name', 'Pham Nhan');
});
Route::get('duyet-session',[\App\Http\Controllers\UserController::class, 'session']);
Route::get('danh-sach-nguoi-dung',[App\Http\Controllers\UserController::class,'list']);
Route::get('xoa-nguoi-dung/{id}',[App\Http\Controllers\UserController::class,'del']);
Route::get('thong-tin-nguoi-dung/{id}',[App\Http\Controllers\UserController::class,'show']);
Route::post('cap-nhat-nguoi-dung',[App\Http\Controllers\UserController::class,'update']);
Route::get('them-nguoi-dung',[App\Http\Controllers\UserController::class,'add']);
Route::post('them-nguoi-dung',[App\Http\Controllers\UserController::class,'save']);
Route::match(['post','get'],'greeting/{id?}',function($id=null){
    if(isset($id))
        return "Hello $id";
    return "ABC";
});
Route::get('list-stu',[\App\Http\Controllers\StudViewController::class, 'index']);
Route::get('login',[\App\Http\Controllers\StudViewController::class, 'login']);
Route::post('act_login',[\App\Http\Controllers\StudViewController::class, 'act_login']);
Route::get('view-records', [\App\Http\Controllers\StudInsertController::class, 'list']);
