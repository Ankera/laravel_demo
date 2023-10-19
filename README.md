## Laravel8.0 学习

#### 学习地址
```text
https://learnku.com/docs/laravel/8.x

https://www.bilibili.com/video/BV1wB4y1P7hm?p=1&vd_source=0b9abcde1e0c06aa453d51487fc56291

https://gitee.com/mirrors/markdown-css
```

#### 启动项目
```text
php artisan serve
```

#### 查看所有路由
```text
php artisan route:list
```

#### 创建一个控制器
```text
php artisan make:controller TestController
```

#### 创建单行为控制器
```text
php artisan make:controller ShowProfile --invokable
```

### 资源控制器
```text
Laravel 的资源路由通过单行代码即可将典型的「CURD (增删改查)」路由分配给控制器
php artisan make:controller PhotoController --resource
```

##### 登录注册
```text
composer require laravel/jetstream

php artisan jetstream:install livewire

npm install
```

##### 数据迁移
```text
php artisan migrate
```

##### 下载语言包
```text
composer require caouecs/laravel-lang:~3.0
```

##### form 表单保留以前数据
```php
old('name');
```

#### 路径
```php
// URL 地址
asset('css/index.css'); // http://127.0.0.1:8000/css/index.css

// 文件在服务器上的路径
public_path('css/index.css');  // /Users/xxx/Documents/php/laravel_demo/public/css/index.css
```

##### 响应流下载
```php
// 下载一个 hello.txt 的文件
return response() -> streamDownload(function () {
    echo 'hello world';
}, 'hello.txt');
```

##### 文件系统创建符号链接
```text
php artisan storage:link;
```

##### 数据迁移
```php
/**
* 一、修改表字段
* php artisan make:migration add_avatar_to_users --table=users
* 不要在数据库直接执行命令，执行迁移文件，方便后续数据库迁移，切记、切记、切记
* users 表新一个avatar 字段
 */
public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('avatar')->comment('用户头像');
    });
}

/**
* 二、新增一个表
* php artisan make:migration create_photos_test_table
 */
public function up(): void
{
    Schema::create('photos_test', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
    });
}

/**
* 执行迁移命令
* php artisan migrate
 */
```

##### 创建验证器-生成校验文件
```text
php artisan make:request UserRequest

执行成功之后，在 app/Http 目录下 生成 Requests/UserRequest.php 文件
个人中心 - 个人信息 - 用户名和邮箱校验在次文件
```

##### 创建一个年龄的中间
```text
 php artisan make:middleware checkAge
```

```php
 public function handle(Request $request, Closure $next, $name): Response
{
    echo '<h1>'.'这是参数'.$name.'</h1>';
    if($request -> age <= 200){
        return  redirect('/');
    }
    return $next($request);
}

// 在 routes.php 中间使用
// 路由组中间
// 多个路由中间件 middleware(['one', 'two'])
// 参数是 `:参数`
Route::middleware('check.age:TOM') -> group(function () {
    Route::get('checkAge', function () {
        return '年龄符号';
    });
});
// 独立路由使用中间件
Route::get('checkAge2', function () {
    return '年龄符号22';
})
    -> middleware('check.age');
```

##### 数据填充 seeder
```php
/**
* 一、单个迁移
* 在 database/seeders/UserSeeder 生产一个php文件
* 提供测试数据或者为生产环境提供必备数据环节
* php artisan make:seeder UserSeeder
 */

public function run(): void
{
    //
    DB::table('users') -> insert([
        'name' => Str::random(10),
        'email' => Str::random(10).'@qq.com',
        'password' => '12345678',
    ]);
}

/**
* 测试数据编辑好之后，执行
* php artisan db:seed --class=UserSeeder
 */

// ==================================
/**
* 二、多个迁移
* DataBaseSeeder.php
* 执行迁移默认命令
 *  php artisan db:seed 
 */
public function run(): void
{
// 这里可以指定迁移的所有文件
// 可以按照先后顺序迁移
    $this -> call([
        UserSeeder::class
    ]);
}
```

##### 自定义辅助函数
```text
修改 composer.json 文件
"autoload": {
    "files": [
        "app/helpers.php"
    ]
},
 
执行，启用 composer
composer dump-autoload
```

##### 创建数据模型，并创建迁移
```text
php artisan make:model Flight -m;
```

##### 
