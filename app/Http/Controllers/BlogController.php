<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{

    /**
     * GET
     * 添加博客页面
     */
    public function create()
    {
        return '添加博客页面';
    }

    /**
     * POST
     * 执行博客添加
     */
    public function store(Request $request)
    {
        return '执行博客添加';
    }

    /**
     * GET
     * 查看一条博客
     */
    public function show(string $id)
    {
        return '查看一条博客22'.$id;
    }

    /**
     * GET
     * 编辑博客
     */
    public function edit(string $id)
    {
        return '编辑博客'.$id;
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
