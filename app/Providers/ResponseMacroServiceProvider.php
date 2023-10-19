<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * 注册应用程序的响应宏。
     *
     * @return void
     */
    public function boot(): void
    {
        Response::macro('api', function ($msg = '', $code = 200, $data = '') {
            $retDat = [
                'code' => $code,
                'msg' => $msg,
                'data' => $data,
                'time' => time(),
            ];
            return response() -> json($retDat);
        });
    }
}
