<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * 该控制类使用 auth 中间件
     * 但是排除 show 方法
     */
    public function __construct(){
        $this -> middleware('auth') -> except('show');
    }

    /**
     * GET
     * 添加博客页面
     */
    public function create()
    {
//        return '添加博客页面';
        return view('blog.create');
    }

    /**
     * POST
     * 执行博客添加
     */
    public function store(BlogRequest $request)
    {
        $all = $request -> all();
        // 方式1：使用DB添加
//        $res = DB::table('blogs') -> insert([
//            'user_id' => auth()->id(),
//            'title' => $request -> input('title'),
//            'content' => $request -> input('content'),
//            'category_id' => $request -> input('category_id'),
//        ]);

        // 方式2：使用模型对象来创建
//        $blog = new Blog();
//        $blog -> user_id = auth() -> id();
//        $blog -> title = $request -> input('title');
//        $blog -> content = $request -> input('content');
//        $blog -> category_id = $request -> input('category_id');
//        $res = $blog -> save();

        // 方式3： 批量模型添加, 必须在模型类设置 $fillable
//        $res = Blog::create([
//            'user_id' => auth()->id(),
//            'title' => $request -> input('title'),
//            'content' => $request -> input('content'),
//            'category_id' => $request -> input('category_id'),
//        ]);

        // 方式4： 用已存在的模型对象，使用fill快速添加
//        $blog = new Blog();
//        $blog -> fill([
//            'user_id' => auth()->id(),
//            'title' => $request -> input('title'),
//            'content' => $request -> input('content'),
//            'category_id' => $request -> input('category_id'),
//        ]);
//        $res = $blog -> save();

        // 方式5： 使用 $request -> all() 添加
//        array_merge($request->except(['_token']), ['user_id' => auth()->id()]);
        $request->offsetSet('user_id', auth() -> id());
        $res = Blog::create($request->except(['_token']));

        if($res) {
            return back() -> with(['success' => '添加成功']);
        }
        return back() -> withErrors('添加失败') -> withInput();
    }

    /**
     * GET
     * 查看一条博客
     */
    public function show(string $id)
    {
//        return '查看一条博客22'.$id;
        return view('blog.show');
    }

    /**
     * GET
     * 编辑博客
     */
    public function edit(string $id)
    {
//        return '编辑博客'.$id;
        return view('blog.edit');
    }

    /**
     * PUT/PATCH
     * 执行编辑博客
     */
    public function update(Request $request, string $id)
    {
        return '执行编辑博客'.$id;
    }

    /**
     * DELETE
     * 删除博客
     */
    public function destroy(string $id)
    {
        return '删除博客'.$id;
    }

    /**
     * 改变博客状态
     * @param string $Id
     */
    public function status(string $Id) {
        return '改变博客状态';
    }
}
