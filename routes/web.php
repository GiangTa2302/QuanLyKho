<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('san-pham', [HomeController::class, 'product'])->name('product');

Route::get('lien-he', [HomeController::class, 'contact'])->name('contact');

Route::get('danh-sach-san-pham/{id}',[ProductController::class,'getProductByCategory'])->name('listProduct');

Route::get('chi-tiet-san-pham/{id}',[ProductController::class,'getDetailProById'])->name('detailProduct');

Route::post('send-mail',[MailController::class,'sendEmail'])->name('sendMail');

Route::prefix('user')->name('user.')->middleware(['auth:sanctum', 'verified'])->group(function(){

    //Chi tiết tài khoản
    Route::get('san-pham', [UserController::class, 'product'])->name('product');

    Route::get('lien-he', [HomeController::class, 'contact'])->name('contact');

    Route::get('tai-khoan/{id}', [UserController::class, 'getUserById'])->name('myAccount');

    Route::get('cart',[HomeController::class, 'cart'])->name('cart');

    Route::get('add-to-cart/{id}/{role}',[ProductController::class, 'addToCart'])->name('addcart');

    Route::get('add-quantity/{id}/{role}',[ProductController::class, 'addQuantity'])->name('addQty');

    Route::get('remove-quantity/{id}/{role}',[ProductController::class, 'removeQuantity'])->name('removeQty');

    Route::get('delete-to-cart/{id}',[ProductController::class, 'deleteToCart'])->name('delTocart');

    Route::get('delete-cart',[ProductController::class, 'deleteCart'])->name('delcart');

    Route::get('checkout',[OrderController::class, 'index'])->name('checkout');

    Route::post('place-order',[OrderController::class, 'placeorder']);

    // Route::get('send-mail',[MailController::class,'sendEmail']);

});

Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){

    //Trang chủ
    Route::get('/',[AdminController::class,'index'])->name('home');

    //Tài khoản cá nhân
    Route::get('/profile',[AdminController::class,'profile'])->name('profile');

    //Danh mục sản phẩm
    Route::get('danh-muc',[CategoryController::class,'index'])->name('danhmuc');

    Route::post('danh-muc',[CategoryController::class,'store'])->name('postCate');

    Route::get('danh-muc/{id}',[CategoryController::class,'getCateById']);

    Route::post('update-danh-muc',[CategoryController::class,'uploadCate'])->name('updateCate');

    Route::delete('danh-muc/{id}',[CategoryController::class,'deleteCateById']);

    //Nhập kho
    Route::get('don-nhap',[OrderController::class,'donnhap'])->name('donnhap');

    Route::get('don-hang-nhap',[OrderController::class,'donhangnhap'])->name('donhangnhap');

    //Xuất kho
    Route::get('don-xuat',[OrderController::class,'donxuat'])->name('donxuat');

    Route::get('don-hang-xuat',[OrderController::class,'donhangxuat'])->name('donhangxuat');

    Route::get('xac-nhan/{id}/{role}',[OrderController::class,'xacnhan'])->name('xacnhan');
    
    Route::get('huy/{id}/{role}',[OrderController::class,'huy'])->name('huy');

    //Sản phẩm
    Route::get('san-pham/{category_id}',[ProductController::class,'index'])->name('sanpham');

    Route::post('san-pham',[ProductController::class,'store'])->name('postPro');

    Route::post('update-san-pham',[ProductController::class,'updatePro'])->name('updatePro');

    Route::delete('san-pham/{id}',[ProductController::class,'deleteProById'])->name('delPro');

    //Thống kê
    Route::get('thong-ke',[AdminController::class,'thongke'])->name('thongke');

    //Nhân viên
    Route::get('nhan-vien',[EmployeeController::class,'index'])->name('nhanvien');

    Route::post('nhan-vien',[EmployeeController::class,'store'])->name('postEmp');

    Route::post('update-nhan-vien',[EmployeeController::class,'uploadEmp'])->name('updateEmp');

    Route::delete('nhan-vien/{id}',[EmployeeController::class,'deleteEmpById']);

    //Khách hàng
    Route::get('khach-hang',[UserController::class,'index'])->name('khachhang');

    Route::post('khach-hang',[UserController::class,'store'])->name('postUser');

    Route::post('update-khach-hang',[UserController::class,'uploadUser'])->name('updateUser');

    Route::delete('khach-hang/{id}',[UserController::class,'deleteUserById']);

    //Nhà cung cấp
    Route::get('nha-cung-cap',[UserController::class,'index'])->name('nhacungcap');

    Route::post('nha-cung-cap',[UserController::class,'store'])->name('postUser');

    Route::post('update-nha-cung-cap',[UserController::class,'uploadUser'])->name('updateUser');

    Route::delete('nha-cung-cap/{id}',[UserController::class,'deleteUserById']);
});