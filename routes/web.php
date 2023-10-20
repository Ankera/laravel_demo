<?php

use Illuminate\Support\Facades\Route;

//Route::get('/child', function () {
//    return view('view', [
//        'name' => 'Tom',
//        'json' => ['name' => 'Tom', 'age' => 12, 'city' => 'beijing'],
//        'records' => ''
//    ]);
//});
//Route::domain('127.0.0.1') -> group(function () {
//    Route::get('domain', function () {
//        return 'hello world';
//    });
//});
//Route::prefix('admin') -> group(function () {
//    Route::get('users', function (){
//        return 'admin users';
//    });
//});
// 路由组中间
//Route::middleware('check.age:TOM') -> group(function () {
//    Route::get('checkAge', function () {
//        return '年龄符号';
//    });
//});
//// 独立路由使用中间件
//Route::get('checkAge2', function () {
//    return '年龄符号22';
//})
//    -> middleware('check.age');

Route::any('/test', \App\Http\Controllers\TestController::class);

Route::get('/welcome', function () {
    return view('welcome');
});


// 首页
Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

// 博客资源路由
Route::resource('blog', \App\Http\Controllers\BlogController::class)->except(['index']);

/**
 * 需要登录的中间件
 */
Route::middleware('auth') -> group(function () {
    /**
     * 博客相关的页面
     */
    Route::prefix('blog')
        -> name('blog.')
        -> group(function (){
            // 补充路由, 改变博客状态，发布与不发布
            Route::patch('/{blog}/status', [\App\Http\Controllers\BlogController::class, 'status'])->name('status');

            // 评论路由
            Route::post('/{blog}/comment', \App\Http\Controllers\CommentController::class)->name('comment');
        });


    /**
     * 个人中心相关页面
     * prefix 新增前缀
     * name 新增命名前缀
     */
    Route::prefix('user')
        -> name('user.')
        -> group(function () {
            // 个人中心 - 修改个人信息 - 页面
            Route::get('/', [\App\Http\Controllers\UserController::class, 'infoPage'])->name('info');

            // 个人中心 - 修改个人信息 - 更新数据
            Route::put('/', [\App\Http\Controllers\UserController::class, 'infoUpdate'])->name('info.update');

            // 个人中心 - 修改个人头像 - 页面
            Route::get('/avatar', [\App\Http\Controllers\UserController::class, 'avatarPage'])->name('avatar');

            // 个人中心 - 修改个人头像 - 更新数据
            Route::put('/avatar', [\App\Http\Controllers\UserController::class, 'avatarUpdate'])->name('avatar.update');

            // 我的所有博客
            Route::get('/blog', [\App\Http\Controllers\UserController::class, 'blog'])->name('blog');
    });
});





// ====================== 路由 ======================
// 博客首页
//Route::get('/', function () {
//    return '博客首页';
//})->name('index');
//
//// 博客详情
//Route::get('/blog/{id}', function ($id) {
//    return '博客详情, 博客ID是:'.$id;
//})->name('blog.show')->where('id', '[0-9]+');
//
//// 添加博客页面
//Route::get('/blog/create', function () {
//    return '添加博客页面';
//})->name('blog.create');
//
//// 提交发布的博客，进行保存
//Route::post('/blog/', function () {
//    return 'save post';
//})->name('blog.store');
//
//// 修改包括页面
//Route::get('/blog/{id}/edit', function ($id) {
//    return '修改博客'.$id.'编辑状态';
//})->name('blog.edit');
//
//// 提交数据，执行修改操作
//Route::put('/blog/{id}', function ($id) {
//    return '提交数据，执行修改操作'.$id;
//})->name('blog.update');
//
//// 删除博客
//Route::delete('/blog/{id}', function ($id) {
//    return '删除的博客'.$id;
//})->name('blog.destroy');
//
//// 改变博客的状态，是否发布
//Route::patch('/blog/{id}', function ($id){
//    return '改变博客的状态，是否发布'.$id;
//})->name('blog.status');
//
//// 个人中心 - 修改个人信息
//Route::get('/user', function () {
//    return '个人中心 - 修改个人信息';
//})->name('user.info');
//
//// 个人中心 - 更新个人呢信息
//Route::put('/user', function () {
//    return '个人中心 - 更新个人呢信息';
//})->name('user.update');
//
//// 个人中心 - 修改用户头像
//Route::get('/user/avatar', function () {
//    return '修改头像页面';
//})->name('user.avatar');
//
//// 个人中心 - 更新用户头像
//Route::put('/user/avatar', function () {
//    return '修改头像页面 - 更新';
//})->name('user.avatar.update');
//
//// 我的所有博客
//Route::get('/user/blog', function () {
//    return '我的所有博客';
//})->name('user.blog');


// 登录、注册，使用laravel提供的

//Route::get('/foo/{id?}', function ($id = 0) {
//    return array(['name' => 'Tom', 'age' => $id]);
//});
//
//Route::match(['get', 'post'], '/match', function () {
//    dd('hello match');
//});
//
//Route::get('user/profile', function () {
//    return route('profile');
//})->name('profile');
//
//
//Route::get('user/{id}/profile', function ($id) {
//    return route('user.profile', $id.$id);
//})->name('user.profile');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
