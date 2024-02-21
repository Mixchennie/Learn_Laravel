<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homecontroller extends Controller
{
    //Action index()
    public function index(){
        return 'home';
    }
    // Action getNews()
    public function getNews(){
        return 'Danh sách tin tức';
    }
    public function getCategories($id){
        return 'Chuyên mục: '.$id;
    }
}
