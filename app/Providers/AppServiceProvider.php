<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 使用 Bootstrap 的分页器
        Paginator::useBootstrap();

        Paginator::defaultView('vendor.pagination.my-page');

        Paginator::defaultSimpleView('vendor.pagination.my-page');
    }
}
