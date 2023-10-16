<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    /**
     * 个人中心 - 修改个人信息 - 页面
     */
    public function infoPage()
    {
//        return '个人中心 - 修改个人信息 - 页面';
        return view('user.info');
    }

    /**
     * 个人中心 - 修改个人信息 - 更新数据
     */
    public function infoUpdate(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $uid = auth() -> id();

        $errors = [];
        if(empty($name) || empty($email)){
            if(empty($name)){
                $errors[] = '用户名不能为空';
            }
            if(empty($email)){
//                array_push($errors, '邮箱不能为空');
                $errors[] = '邮箱不能为空';
            }
            if(!empty($errors)){
                return  back() -> withErrors($errors);
            }
        }
        /**
         * $uid = auth() -> user() -> id;
         * $uid = auth() -> id();
         * $uid = Auth:id();
         */
        if($uid){
            $res = DB::table('users')
                -> where('id', $uid)
                -> update(
                ['name' => $name, 'email' => $email]
            );
            if($res){
                // 使用模型更新数据
                $user = auth() -> user();
                $user -> name = $name;
                $user -> email = $email;
                $user -> save();
//                return  back() -> withInput();
                return  back() -> with(['success' => '数据更新成功']);
            }
            return  back() -> withErrors('未做更改');
        }
        return  back() -> withErrors('服务器异常，请联系管理员');
    }

    /**
     * 个人中心 - 修改个人头像 - 页面
     */
    public function avatarPage(Request $request)
    {
//        return '个人中心 - 修改个人头像 - 页面';
        return view('user.avatar');
    }

    /**
     * 个人中心 - 修改个人头像 - 更新数据
     */
    public function avatarUpdate(Request $request)
    {
        $file = $request -> file('avatar');
        if(empty($file)){
            return  back() -> withErrors('请上传头像');
        }
        $path = $file -> store('avatar', 'public');
        $uid = auth() -> id();

        // 原有头像
        $oldAvatar = auth() -> user() -> avatar;

        if($uid){
            $res = DB::table('users')
                -> where('id', $uid)
                -> update(['avatar' => $path]);
            if($res){

                /**
                 * 数据库更新之后，删除原有的头像
                 */
                Storage::disk('public') -> delete($oldAvatar);

                return  back() -> with(['success' => '头像更新成功']);
            }
            return  back() -> withErrors('未做更改');
        }
        return  back() -> withErrors('服务器异常，请联系管理员');
    }

    /**
     * 我的所有博客
     * @return string
     */
    public function blog(){
//        return ' 我的所有博客';
        return  view('user.blog');
    }

}
