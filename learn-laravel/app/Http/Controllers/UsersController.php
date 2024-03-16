<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    private $users;

    public function __construct()
    {
        $this->users = new Users();
    }

    public function index()
    {
        $statement = $this ->users->statementUser('DELETE  FROM users');
        $title = 'Danh sách người dùng';
        $this->users->learnQueryBuilder();
        $users = new Users();

        $usersList = $users->getAllUsers();

        return view('clients.users.lists', compact('title', 'usersList'));
    }

    public function add()
    {
        $title = "Thêm người dùng";
        return view('clients.users.add', compact('title'));
    }

    public function postAdd(Request $request)
    {
        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users' // Fixed validation rule for email
        ], [
            'fullname.required' => 'Họ và tên bắt buộc phải nhập',
            'fullname.min' => 'Họ và tên phải từ :min ký tự trở lên',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại trên hệ thống',

        ]);

        $dataInsert = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s') // Fixed column name for created_at
        ];

        $this->users->addUser($dataInsert); // Fixed variable name

        return redirect()->route('users.index')->with('msg', 'Thêm người dùng thành công');
    }

    public function getEdit(Request $request, $id=0){
        $title = 'Cập nhật người dùng';

        if (!empty($id)){
            $userDetail =  $this ->users->getDetail($id);
            if (!empty($userDetail[0])){
                $request->sesion()->store('id', $id);
                $userDetail= $userDetail[0];
            }else{
                return redirect()->route('users.index')->with('msg', 'Người dùng không tồn tại');
            }
        }else{
            return redirect(route('users.index'))->with('msg', 'Liên kết không tồn tại');
        }
        return view('clients.users.edit', compact('title', 'userDetail'));
        
    }
    public function postEdit(Request $request){
        $id = session('id');
        if (empty($id)){
            return back()->with('msg', 'liên kết không tồn tại');
        }
        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|email|nique:users,email,'// Fixed validation rule for email
        ], [
            'fullname.required' => 'Họ và tên bắt buộc phải nhập',
            'fullname.min' => 'Họ và tên phải từ :min ký tự trở lên',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            // 'email.unique' => 'Email đã tồn tại trên hệ thống',

        ]);
        $dataUpdate = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s') 
        ];
        $this->users->updateUser($dataUpdate, $id);

        return back()->with('msg','Cập nhật người dùng');
    }

    public function delete($id=0){
        if (!empty($id)){
            $userDetail =  $this ->users->getDetail($id);
            if (!empty($userDetail[0])){
                $deleteStatus = $this->users->deleteUser($id);
                if ($deleteStatus){
                    $msg = 'Xóa người dùng thành công';
                }else{
                    $msg = "bạn không thể xóa người dùng lúc này. Vui lòng thử lại sau";
                }
            }else{
                $msg = 'Người dùng không tồn tại';
            }
        }else{
            $msg= 'Liên kết không tồn tại';
        }
        return redirect(route('users.index'))->with('msg', $msg);
    }   
}