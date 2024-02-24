<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct(Request $request)
    {
        // echo 'Welcome';
        /*
        Nếu là trang danh sách chuyên mục => hiển thị ra dòng chữ: xin chào Unicode
         */
        // if ($request-> is('categories')){
        //     echo '<h3>xin chào Unicode</h3>';
        // }
        }
    // Hiển thị danh sách chuyên mục (Phương thức GET)
    public function index(Request $request){
        // if(isset($_GET['id'])){
        //     echo $_GET['id'];
        // }
        // $path = $request->path();
        // echo $path;
        // $url = $request->url();
        // $fulUrl = $request->fullUrl();
        // echo $fulUrl;
        // $method = $request->method();
        // echo $method;
        $ip = $request->ip();
        // echo 'IP là: '.$ip;
        // if($request->isMethod('GET')){
        //     echo 'Phương thức get';
        // }
        // $server = $request->serve();
        // print_r($server);
        // dd($_SERVER);
        // $header = $request ->header('user-agent');
        // dd($header);
        // $id = $request ->input('id');
        // echo $id;
        // $id = $request ->input('id.*.name');
        // $id = $request->id;
        // $name =$request->name;
        // dd($id);
        $name = request('name', 'Unicode');
        dd($name);
        return view("clients/categories/list");
    }
    // Lấy ra một chuyên mục theo id (Phương thức GET)
    public function getCategory($id){
        return view("clients/categories/edit");
    }
    // Sửa 1 chuyên mục (Phương thức POST)
    public function updateCategory($id){
        return "Submit sửa chuyên mục: ".$id;
    }
    // Show form thêm dữ liệu (Phương thức GET)
    public function addCategory(Request $request){
        $path = $request->path();
        echo $path;
        return view("clients/categories/add");
    }
    // Thêm dữ liệu vào chuyên mục (Phương thức POST)
    public function handleAddCategory(Request $request){
        // $allData = $request->all();
        // echo $request->all()['name'];
        // dd($allData);
     

        // if($request->isMethod('POST')){
        //     echo 'Phương thức post ';
        // }
        // return redirect(route('categories.add'));
        // return "Submit thêm chuyên mục";
    }
    // Xóa dữ liệu (Phương thức delete)
    public function deleteCategory($id){
        return "Submit xóa chuyên mục".$id;
    }
}
