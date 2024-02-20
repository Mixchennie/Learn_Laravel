<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\homecontroller;

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
    $html= "<h1>Học lập trình tại Unicode</h1>";
    return $html;
});

// Route::get('/unicode', function () {
//     return "Phương thức get của path/unicode";
// });
// Route::get('/unicode', function () {
//     return view('form');
// });

// Route::post('/unicode', function () {
//     return "Phương thức post của path/unicode";
// });
// Route::put('/unicode', function () {
//     return "Phương thức put của path/unicode";
// });
// Route::delete('/unicode', function () {
//     return "Phương thức delete của path/unicode";
// });
// Route::patch('/unicode', function () {
//     return "Phương thức patch của path/unicode";
// });
// Route::any('/unicode', function (Request $request) {
//     return $request->method();
// });
// Route::get('show-form', function () {
//         return view('form');
// });
// Route::redirect('/unicode', 'show-form', 404);
// Route::view('show-form', 'form');


Route::get('/','App\Http\Controllers\HomeController@index')->name('home');
Route::get('/tin-tuc','App\Http\Controllers\HomeController@getNews')->name('news');
Route::get('/chuyen-muc/{id}',[homecontroller::class, 'getCategories']);

Route:Route::prefix('admin')->group(function(){
    // Matches The "/url/users" URL
    Route::get('tin-tuc/{id?}/{slug?}.html', function ($id=null,$slug=null) {
        $content ='Phương thức get của path/unicode với tham số: ';
        $content.= 'id = '.$id. '<br/>';
        $content.= 'slug = '.$slug;
        return $content;
    })-> where('id','\d+')->where('slug', '.+')->name('admin.tintuc');
    Route::get('show-form', function () {
            return view('form');
    }) ->name('admin.show-form');
    Route::prefix('products')->middleware('checkpermission')->group(function(){
        Route::get('/', function () {
            return 'Danh sách sản phẩm';
        });
        Route::get('add', function () {
            return 'Thêm sản phẩm';
        })->name('admin.products.add');
        Route::get('edit', function () {
            return 'Sửa sản phẩm';
        });
        Route::get('delete', function () {
            return 'Xóa sản phẩm';
        });
    });
});
