<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index(){
        // $allPost =Post::all();
        // dd($allPost);

        $post = new Post();
        $post->title = 'Bài viết 3';
        $post->content = 'Nội dung 3';
        // $post->status=1;
        $post->save();
    }
}
