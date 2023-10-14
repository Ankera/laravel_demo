<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * 评论路由
     */
    public function __invoke(Request $request)
    {
        return '评论路由';
    }
}
