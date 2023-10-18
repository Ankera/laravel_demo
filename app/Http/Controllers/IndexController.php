<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // 博客首页
    public function index(Request $request){
//        $blogs = Blog::where('status', 1) -> get();
//        return view('index.index',['blogs' => $blogs]);
        $keyword = $request -> input('keyword'); // query('key')
        $category_id = $request -> input('category_id');
//        dd($keyword);

        $blogs = Blog::when($keyword, function ($query) use ($keyword) {
           $query->where(function ($query) use($keyword) {
               $query -> where('title', 'like', "%{$keyword}%")
                   -> orWhere('content', 'like', "%{$keyword}%");
           });
        })
            ->when($category_id, function ($query) use($category_id) {
                $query -> where('category_id', $category_id);
            })
            ->where('status', 1)
            ->orderBy('updated_at', 'desc')
            -> paginate(2);
        return view('index.index',['blogs' => $blogs]);
    }
}
