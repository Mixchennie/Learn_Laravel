<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use Illuminate\Http\Response;

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
Route::get('/san-pham', [HomeController::class, 'products'])->name('product');
Route::get('/them-san-pham', [HomeController::class, 'getAdd']);
// Route::post('/them-san-pham', [HomeController::class, 'postAdd']);
Route::put('/them-san-pham', [HomeController::class, 'putAdd']);
Route::get('/lay-thong-tin', [HomeController::class, 'getArr']);

// Route::get('demo-response', function () { 
//     return view('clients.contents.demo-test');
// })->name('demo-response');

// Route::post('demo-response', function(Request $request){
//     if(!empty($request->username)){
//         return back()->withInput()->with('mess', 'validate thành công');
//     }
//     return redirect(route('demo-response'))->with('mess', 'Validate không thành công');
// });

// Route::get('download-image', [HomeController::class, 'downloadImage'])->name('download-image');
// Route::get('download-doc', [HomeController::class, 'downloadImage'])->name('download-image');

