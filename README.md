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
