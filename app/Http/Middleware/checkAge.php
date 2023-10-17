<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $name): Response
    {
        echo '<h1>'.'这是参数'.$name.'</h1>';
        if($request -> age <= 200){
            return  redirect('/');
        }
        return $next($request);
    }
}
