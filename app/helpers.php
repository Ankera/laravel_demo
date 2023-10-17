<?php
use \Illuminate\Support\Facades\DB;

// 返回博客分类
if(!function_exists('categories')){

    function categories()
    {
        return DB::table('categories') -> pluck('name', 'id');
    }
}

