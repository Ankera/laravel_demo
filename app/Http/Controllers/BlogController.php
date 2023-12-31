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
//    public function show(Blog $blog)
    public function show($id)
    {
        $blog = Blog::with('comments.user')
            -> where('id', $id)
            -> first();

        $blog->timestamps = false;
        $blog->increment('view');
        $blog->timestamps = true;
        return view('blog.show', ['blog' => $blog]);
    }

    /**
     * GET
     * 编辑博客
     */
    public function edit(Blog $blog)
    {
//        return '编辑博客'.$id;
        return view('blog.edit', ['blog' => $blog]);
    }

    /**
     * PUT/PATCH
     * 执行编辑博客
     */
    public function update(BlogRequest $request, Blog $blog)
    {
//        dd($blog);
        // 方式1：
//        $blog -> title =  $request -> input('title');
//        $blog -> content =  $request -> input('content');
//        $blog -> category_id =  $request -> input('category_id');
//        $res = $blog -> save();

        // 方式2
        $blog -> fill($request -> except(['_token', '_method']));
        $res = $blog -> save();

        if($res) {
            return back() -> with(['success' => '编辑成功']);
        }
        return back() -> withErrors('编辑失败') -> withInput();
    }

    /**
     * DELETE
     * 删除博客
     */
    public function destroy(Blog $blog)
    {
        $res = $blog -> delete();
        if($res) {
            return response() -> api('删除成功', 200);
        }
        return response() -> api('删除失败');
    }

    /**
     * 改变博客状态
     * @param string $Id
     */
    public function status(Blog $blog) {

        $blog -> status = $blog -> status === 1 ? 0 : 1;
        $blog->timestamps = false;
        $res = $blog -> save();
        $blog->timestamps = true;
        if($res) {
            $msg = $blog -> status === 1 ? '发布成功' : '取消发布';
            return response() -> api($msg, 200);
        }
        return response() -> api('修改失败');
    }
}
