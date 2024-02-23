<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Clients route
Route::prefix('categories')->group(function(){
    // danh sách chuyên mục
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.list');
    // Lấy chi tiết 1 chuyên mục(Áp dụng show form sửa chuyên mục)
    Route::get('/edit/{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');
    // Xử lý update chuyên mục
    Route::post('/edit/{id}', [CategoriesController::class, 'updateCategory']);
    // Hiển thị form chuyên mục
    Route::get('/add', [CategoriesController::class, 'addCategory'])->name('categories.add');
    // Xử lý thêm chuyên mục
    Route::post('/add', [CategoriesController::class, 'handleAddCategory']);
    // Hiển thị form chuyên mục
    Route::get('/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');
});
Route::get('san-pham/{id}', [HomeController::class, 'getProductDetail']);
// Admin route

Route::middleware('auth.admin')->prefix('admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('products', ProductsController::class)->middleware('auth.admin.product');
    
    Route::prefix('admin')->group(function(){
        Route::resource('products', ProductsController::class);
    });
});

