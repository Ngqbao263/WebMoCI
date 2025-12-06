<?php

use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/{slug}.html', [HomeController::class, 'show'])->name('home.show');
Route::get('/introduc', [HomeController::class, 'introduce'])->name('home.introduce');
Route::get('/product', [HomeController::class, 'product'])->name('home.product');
Route::get('/san-pham/{slug}', [HomeController::class, 'showProducts'])->name('product.show');
Route::get('/news', [HomeController::class, 'news'])->name('home.news');
Route::get('/tin-tuc/{slug}.html', [HomeController::class, 'showNews'])->name('news.show');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');


//Admin
Route::middleware(['auth'])->group(function () {
    //Admin tin tức
    Route::get('/index', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('/create', [NewsController::class, 'create'])->name('admin.news.new');
    Route::post('/store', [NewsController::class, 'store'])->name('admin.news.storeNews');
    Route::get('/show/{id}', [NewsController::class, 'show'])->name('admin.news.show');
    Route::post('/admin/upload-image', [NewsController::class, 'uploadImage'])->name('admin.uploadImage');//Thêm hình vào phần nội dung
    Route::get('/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/admin/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/admin/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

    // Admin sản phẩm
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/category/{category}', [ProductController::class, 'indexByCategory'])->name('admin.products.category');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.new');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('admin/show/{id}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');


    //Duyệt
    Route::get('/admin/pending', [AdminController::class, 'pending'])->name('admin.page.pending');
    Route::put('/admin/news/{id}/approve', [NewsController::class, 'approve'])->name('admin.news.approve');
    Route::put('/admin/news/{id}/reject', [NewsController::class, 'reject'])->name('admin.news.reject');

    Route::put('/admin/products/{id}/approve', [ProductController::class, 'approve'])->name('admin.products.approve');
    Route::put('/admin/products/{id}/reject', [ProductController::class, 'reject'])->name('admin.products.reject');

    //Admin người dùng
    Route::get('/admin/listuser', [UserController::class, 'index'])->name('admin.user.index');
    Route::post('/admin/update-role/{userId}', [UserController::class, 'updateRole'])->name('admin.user.updateRole');
    Route::get('/admin/editUser/{id}', [UserController::class, 'editUser'])->name('admin.user.edit');
    Route::put('/admin/updateUser/{id}', [UserController::class, 'updateUser'])->name('admin.user.updateUser');
    Route::delete('/admin/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('admin.user.deleteUser');

    //Tạo user
    Route::get('/admin/createUser', [UserController::class, 'createUser'])->name('admin.user.new');
    Route::post('/admin/storeUser', [UserController::class, 'storeUser'])->name('admin.user.storeUser');

});

//Login admin
Route::get('/admin', [AuthAdminController::class, 'login'])->name('loginAdmin');
Route::post('/admin/login', [AuthAdminController::class, 'postLogin'])->name('postLoginAdmin');
Route::post('/logout', [AuthAdminController::class, 'logout'])->name('logout');
