## Laravel 学习

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
