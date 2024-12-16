<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('session',function(Request $request){
    $request->session()->put("cart.products", [['id' => 123, 'item' => 5]]);
    $request->session()->push("cart.products",['id' => 'ABC', 'item' => 7]);
    return redirect()->to('danh-sach-nguoi-dung');
});
//trang chu
Route::get('cua-hang',[App\Http\Controllers\HomeController::class,'list']);
Route::get('them-gio-hang/{id}',[App\Http\Controllers\HomeController::class,'add_cart']);
Route::get('gio-hang/',[App\Http\Controllers\HomeController::class,'cart']);
Route::post('cap-nhat-gio-hang/',[App\Http\Controllers\HomeController::class,'update_cart']);
Route::get('xoa-gio-hang/{id}',[App\Http\Controllers\HomeController::class,'del_cart']);
Route::post('them-nguoi-dung',[App\Http\Controllers\HomeController::class,'save']);


Route::get('/products', [HomeController::class, 'list'])->name('products');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::post('/add-to-cart/{id}', [HomeController::class, 'add_cart'])->name('add_to_cart');
Route::post('remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove_cart');
Route::post('checkout', [HomeController::class, 'checkout'])->name('checkout');






//Người dùng
Route::get('danh-sach-nguoi-dung',[App\Http\Controllers\UserController::class,'list']);
Route::get('xoa-nguoi-dung/{id}',[App\Http\Controllers\UserController::class,'del']);
Route::get('thong-tin-nguoi-dung/{id}',[App\Http\Controllers\UserController::class,'show']);
Route::post('cap-nhat-nguoi-dung',[App\Http\Controllers\UserController::class,'update']);
Route::get('them-nguoi-dung',[App\Http\Controllers\UserController::class,'add']);
Route::post('them-nguoi-dung',[App\Http\Controllers\UserController::class,'save']);
//Danh mục
Route::get('danh-sach-danh-muc',[App\Http\Controllers\CategoryController::class,'list']);
Route::get('xoa-danh-muc/{id}',[App\Http\Controllers\CategoryController::class,'del']);
Route::get('thong-tin-danh-muc/{id}',[App\Http\Controllers\CategoryController::class,'show']);
Route::post('cap-nhat-danh-muc',[App\Http\Controllers\CategoryController::class,'update']);
Route::get('them-danh-muc',[App\Http\Controllers\CategoryController::class,'add']);
Route::post('them-danh-muc',[App\Http\Controllers\CategoryController::class,'save']);
//Sản phẩm
Route::get('danh-sach-san-pham',[App\Http\Controllers\ProductController::class,'list']);
Route::get('xoa-san-pham/{id}',[App\Http\Controllers\ProductController::class,'del']);
Route::get('thong-tin-san-pham/{id}',[App\Http\Controllers\ProductController::class,'show']);
Route::post('cap-nhat-san-pham',[App\Http\Controllers\ProductController::class,'update']);
Route::get('them-san-pham',[App\Http\Controllers\ProductController::class,'add']);
Route::post('them-san-pham',[App\Http\Controllers\ProductController::class,'save']);

Route::match(['post','get'],'greeting/{id?}',function($id=null){
    if(isset($id))
        return "Hello $id";
    return "ABC";
});
Route::get('list-stu',[\App\Http\Controllers\StudViewController::class, 'index']);
Route::get('login',[\App\Http\Controllers\StudViewController::class, 'login']);
Route::post('act_login',[\App\Http\Controllers\StudViewController::class, 'act_login']);
Route::get('view-records', [\App\Http\Controllers\StudInsertController::class, 'list']);
