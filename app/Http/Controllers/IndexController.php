<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // 博客首页
    public function index(){
//        $blogs = Blog::where('status', 1) -> get();
//        return view('index.index',['blogs' => $blogs]);

        $blogs = Blog::where('status', 1) -> paginate(2);
        return view('index.index',['blogs' => $blogs]);
    }
}
