<?php
use \Illuminate\Support\Facades\DB;

// 返回博客分类
if(!function_exists('categories')){

    function categories()
    {
        // 方式1
//        $categories = cache('categories');
//        if(empty($categories)){
//            $categories = DB::table('categories') -> pluck('name', 'id');
//
//            cache(['categories' => $categories]);
//        }

        // 方式2
        $categories = cache() -> rememberForever('categories', function () {
            return DB::table('categories') -> pluck('name', 'id');;
        });

       return $categories;
    }
}

