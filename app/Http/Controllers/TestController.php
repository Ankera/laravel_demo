<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPodcast;
use App\Mail\OrderShipped;
use App\Models\Blog;
use App\Models\Flight;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\table;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     * test
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
//        categories();
//        Cache::increment('number');
//        $value = Cache::get('number', 'default');
//        dd($value);
//        return 'hello test';
//        $value = Cache::get('users', function (){
////            return 'hello';
//            return DB::table('users') -> pluck('name', 'id');
//        });
//        $value = Cache::rememberForever('users', function () {
//            return 'rememberForever';
//        });
//        $value = Cache::get('users');
//        Cache::forget('rememberForever');
//        dd('$value = '.now());
//        Flight::all();

        //
//        $flight = new Flight();
//        $flight->fill(['name' => 'Flight 22']);
//        $flight -> name = '北京';
//        $res = $flight -> save();
//        dd($flight);
//        $flight = Flight::find(1);
//        $flight->name = "上海";
//        $flight->save();
//        Flight::where('name', '北京') -> update('name', '北京北京');
//        $res = Flight::all();
//        dd($res);
//       $res = Flight::create(['name' => '3333']);
//        $res = Flight::insert([]);
//        return $flight;
//        $flight = Flight::find(1);
//        $flight -> delete();
//        $user = User::find(4);
//        $blog = $user->blogs()->where('status', 1)-> get();
//        $user = User::doesntHave('blogs') -> get();
//        $users = User::with('blogs') -> get();
//        dd($users);
//        $user = User::find(1);
//        $blogs = new Blog(['title' => 'bb', 'content' => 'bb', 'category_id' => 1]);
//        $user -> blogs() -> save($blogs);
//        $blogs = Blog::all();
//        $retDat = [
//            'code' => 200,
//            'message' => 'success',
//            'data' => $blogs,
//        ];
////        return response() -> json($retDat);
//        return response() -> api('success', 200, $blogs);
//        Mail::to('15189120919@139.com') -> send(new OrderShipped());

        ProcessPodcast::dispatch();
        return 'hello test';
    }
}
