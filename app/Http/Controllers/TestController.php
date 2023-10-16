<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\table;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
//        $users = DB::table('users')->get();
//        echo  $users[0] -> name;
//        $u1 = DB::table('users') -> find(1);
//        $u1 = DB::table('users') -> pluck('email', 'name');
//        $t1 = DB::table('users') -> count();
//        $t2 = DB::table('users') -> get() -> count();
//        $users = DB::table('users') -> select('name as nameType', 'id as key') -> get();
//        $users = DB::table('users') ->
//            where('id', '1') ->
//            where('email', '121@qq.com') ->
//            get();
//        $users = DB::table('users');
//        $res = DB::table('users') -> insert(
//            ['name' => 'Tom2', 'email' => '4223@qq.com', 'password' => '12345678']
//        );
//        DB::table('users') -> where('id', 2) -> increment('name');
//        return '$res';
//        return ['name' => 'Tom', 'age' =>  12];
//        echo asset('css/index.css');
//        echo '<hr />';
//        echo public_path('css/index.css');
//        return response() -> streamDownload(function () {
//            echo 'hello world';
//        }, 'hello.txt');
//        return response('hello world', 200)
//            -> header('Content-Type', 'text/plain')
//            -> header('Content-Name-z', '121');
//        return Storage::put('test/file.txt', 'hello text');
//        return Storage::disk('public') -> put('file.txt', 'hello text');
        return 'hello test';
    }
}
