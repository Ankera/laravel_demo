<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 个人中心 - 修改个人信息 - 页面
     */
    public function infoPage()
    {
        return '个人中心 - 修改个人信息 - 页面';
    }

    /**
     * 个人中心 - 修改个人信息 - 更新数据
     */
    public function infoUpdate()
    {
        return ' 个人中心 - 修改个人信息 - 更新数据';
    }

    /**
     * 个人中心 - 修改个人头像 - 页面
     */
    public function avatarPage(Request $request)
    {
        return '个人中心 - 修改个人头像 - 页面';
    }

    /**
     * 个人中心 - 修改个人头像 - 更新数据
     */
    public function avatarUpdate(string $id)
    {
        return '个人中心 - 修改个人头像 - 更新数据';
    }

    /**
     * 我的所有博客
     * @return string
     */
    public function blog(){
        return ' 我的所有博客';
    }

}
