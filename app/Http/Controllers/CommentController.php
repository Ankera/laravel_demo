<?php

namespace App\Http\Controllers;

use App\Mail\BlogComment;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    /**
     * 评论路由
     */
    public function __invoke(Request $request, Blog $blog)
    {

        $comment = $blog -> comments() -> create([
            'user_id' => auth() -> id(),
            'content' => $request -> input('content'),
        ]);
        if($comment){
            $retData = [
                'avatar_url' => avatar(auth() -> user() -> avatar),
                'name' => auth() -> user() -> name,
                'content' => $request -> input('content'),
            ];
            // 通知有新的评论
            Mail::to($blog -> user) -> send(new BlogComment($comment));

            return  response() -> api('评论成功', 200, $retData);
        }
        return   response() -> api('评论失败', 400);
    }
}
