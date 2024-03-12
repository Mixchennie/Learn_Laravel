<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProductRequest;
use App\Rules\Uppercase;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = 'Đào tạo lập trình web';
        $data['message'] = 'Đăng ký tài khoản thành công';

        return view('clients.home', $data);
    }

    public function products()
    {
        $data['title'] = 'Sản phẩm';
        return view('clients.products', $data);
    }

    public function getAdd()
    {
        $data['title'] = 'Thêm sản phẩm';
        $data['errorMessage'] = 'Vui lòng kiểm tra lại dữ liệu';

        return view('clients.add', $data);
    }

    public function postAdd(ProductRequest $request)
    {
        
        $rules = [
            'product_name' => ['required','min:6'],
               
            'product_price' => ['required','integer']
        ];

        
        $messages = [
            'required' => 'Trường :attribute bắt buộc phải nhập',
            'min' => 'Tên sản phẩm không được nhỏ hơn :min ký tự',
            'integer' => 'Giá sản phẩm bắt buộc phải nhập',
        ];
        $attributes =  [
            'product_name'=>'Tên sản phẩm',
            'product_price'=>'Giá sản phẩm'

        ];

        // $validator = Validator::make($request->all(), $rules, $messages, $attributes);
        // $validator->validate();
        $request->validate($rules, $messages);
        return response()->json(['status'=>'success']);
        // $validator->validate();
        // if ($validator->fails()) {
        //     $validator->errors()->add('msg', 'Vui lòng kiểm tra dữ liệu');
        //     // return 'Validate thất bại';
        // }else{
        //     // return 'Validate thành công';
        //     return redirect()->route('product')->with('msg', 'Validate thành công');
        // }
        // return back()->withErrors($validator);
        // $messages = [
        //     'required' => 'Trường :attribute bắt buộc phải nhập',
        //     'min' => 'Tên sản phẩm không được nhỏ hơn :min ký tự',
        //     'integer' => 'Giá sản phẩm bắt buộc phải nhập',
        // ];

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // Process the data and add it to the database

        // return redirect()->back()->with('success', 'Thêm sản phẩm thành công');
    }

    public function putAdd(Request $request)
    {
        return 'Phương thức PUT';
        dd($request);
    }

    public function getArr()
    {
        $contentArr = [
            'name' => 'Laravel 8.x',
            'lesson' => 'Khóa học lập trình Laravel',
            'academy' => 'Unicode Academy'
        ];

        return $contentArr;
    }

    public function downloadImage(Request $request)
    {
        if (!empty($request->image)) {
            $image = trim($request->image);
            $fileName = 'image_' . uniqid() . '.jpg';
            $fileName = basename($image);

            return response()->download($image, $fileName);
        }
    }

    public function downloadDoc(Request $request)
    {
        if (!empty($request->file)) {
            $file = trim($request->file);
            $fileName = 'tai-lieu' . uniqid() . '.pdf';

            $headers = [
                'Content-Type' => 'application/pdf'
            ];

            return response()->download($file, $fileName, $headers);
        }
    }
    
}