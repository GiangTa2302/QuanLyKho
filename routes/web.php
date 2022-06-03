<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('san-pham', [HomeController::class, 'product'])->name('product');

Route::get('lien-he', [HomeController::class, 'contact'])->name('contact');

Route::get('danh-sach-san-pham/{id}',[ProductController::class,'getProductByCategory'])->name('listProduct');

Route::get('chi-tiet-san-pham/{id}',[ProductController::class,'getDetailProById'])->name('detailProduct');

Route::prefix('user')->name('user.')->middleware(['auth:sanctum', 'verified'])->group(function(){

    //Chi tiết tài khoản
    Route::get('san-pham', [UserController::class, 'product'])->name('product');

    Route::get('lien-he', [HomeController::class, 'contact'])->name('contact');

    Route::get('tai-khoan/{id}', [UserController::class, 'getDetailUser'])->name('myAccount');

    Route::get('cart',[HomeController::class, 'cart'])->name('cart');

    Route::get('add-to-cart/{id}',[ProductController::class, 'addToCart'])->name('addcart');

    Route::get('delete-to-cart/{id}',[ProductController::class, 'deleteToCart'])->name('delcart');

    Route::get('delete-cart',[ProductController::class, 'deleteCart'])->name('delcart');

    Route::get('checkout',[OrderController::class, 'index'])->name('checkout');

    Route::post('place-order',[OrderController::class, 'placeorder']);

});

Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){

    Route::get('/',[AdminController::class,'index'])->name('home');

    //Nhập kho
    Route::get('don-nhap',[OrderController::class,'donnhap'])->name('donnhap');

    Route::get('don-hang-nhap',[OrderController::class,'donhangnhap'])->name('donhangnhap');

    //Xuất kho
    Route::get('don-xuat',[OrderController::class,'donxuat'])->name('donxuat');

    Route::get('don-hang-xuat',[OrderController::class,'donhangxuat'])->name('donhangxuat');

    Route::get('xac-nhan/{id}',[OrderController::class,'xacnhan'])->name('xacnhan');
    
    Route::get('huy/{id}',[OrderController::class,'huy'])->name('huy');

    //Sản phẩm
    Route::get('san-pham',[ProductController::class,'index'])->name('sanpham');

    Route::post('san-pham',[ProductController::class,'add'])->name('postPro');

    Route::get('san-pham/{id}',[ProductController::class,'getProById']);

    Route::post('update-san-pham',[ProductController::class,'uploadPro'])->name('updatePro');

    Route::delete('san-pham/{id}',[ProductController::class,'deleteProById']);

    //Thống kê
    Route::get('thong-ke',[AdminController::class,'thongke'])->name('thongke');

    //Nhân viên
    Route::get('nhan-vien',[EmployeeController::class,'index'])->name('nhanvien');

    Route::post('nhan-vien',[EmployeeController::class,'store'])->name('postEmp');

    Route::get('nhan-vien/{id}',[EmployeeController::class,'getEmpById']);

    Route::post('update-nhan-vien',[EmployeeController::class,'uploadEmp'])->name('updateEmp');

    Route::delete('nhan-vien/{id}',[EmployeeController::class,'deleteEmpById']);

    //Khách hàng
    Route::get('khach-hang',[UserController::class,'index'])->name('khachhang');

    Route::post('khach-hang',[UserController::class,'store'])->name('postUser');

    Route::get('khach-hang/{id}',[UserController::class,'getUserById']);

    Route::post('update-khach-hang',[UserController::class,'uploadUser'])->name('updateUser');

    Route::delete('khach-hang/{id}',[UserController::class,'deleteUserById']);

    //Nhà cung cấp
    Route::get('nha-cung-cap',[UserController::class,'index'])->name('nhacungcap');

    Route::post('nha-cung-cap',[UserController::class,'store'])->name('postUser');

    Route::get('nha-cung-cap/{id}',[UserController::class,'getUserById']);

    Route::post('update-nha-cung-cap',[UserController::class,'uploadUser'])->name('updateUser');

    Route::delete('nha-cung-cap/{id}',[UserController::class,'deleteUserById']);
});



