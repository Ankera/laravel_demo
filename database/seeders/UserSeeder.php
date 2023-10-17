<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * 添加用户测试数据
     * Run the database seeds.
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
}
