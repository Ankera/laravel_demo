<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * 评论路由
     */
    public function __invoke(Request $request, Blog $blog)
    {

        $res = $blog -> comments() -> create([
            'user_id' => auth() -> id(),
            'content' => $request -> input('content'),
        ]);
        if($res){
            $retData = [
                'avatar_url' => avatar(auth() -> user() -> avatar),
                'name' => auth() -> user() -> name,
                'content' => $request -> input('content'),
            ];
            return  response() -> api('评论成功', 200, $retData);
        }
        return   response() -> api('评论失败', 400);
    }
}
