<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public $data = [];
    //Action index()
    public function index(){
        $this->data['title'] = 'Đào tạo lập trình web';
        $this->data['message'] = 'Đăng ký tài khoản thành công';


        return view('clients.home', $this->data);
    }
    public function products(){
        $this->data['title'] = 'Sản phẩm';
        return view('clients.products', $this->data);
    }

    public function getAdd(){
        $this->data['title'] = 'Thêm sản phẩm';

        return view('clients.add',$this->data);
    }
    public function postAdd(Request $request){
       dd($request);
    }
    public function putAdd(Request $request){
        return 'Phương thức  PUT';
        dd($request);
     }
    public function getArr(){
        $contentArr = [
            'name'=> 'Laravel 8.x',
            'lesson' => 'Khóa học lập trình Laravel',
            'academy' => 'Unicode Academy'
        ];
        return $contentArr;
    }

    public function downloadImage(Request $request){
        if (!empty($request->image)){
            $image = trim($request->image);
            $fileName = 'image_'.uniqid().'.jpg';
            $fileName = basename($image);
            // return response()->streamDownload(function() use($image) {
            //     $imageContent = file_get_contents($image);
            //     echo $imageContent;
            // }, '$fileName');

            return response()->download($image, $fileName);
        }
    }
    public function downloadDoc(Request $request){
        if (!empty($request->file)){
            $file = trim($request->image);
            $fileName = 'tai-lieu'.uniqid().'.pdf';
            // $fileName = basename($image);
            // return response()->streamDownload(function() use($image) {
            //     $imageContent = file_get_contents($image);
            //     echo $imageContent;
            // }, '$fileName');
            $headers = [
                'Content-Type' =>'application/pdf'
            ];
            return response()->download($file, $fileName);
        }
    }
}
