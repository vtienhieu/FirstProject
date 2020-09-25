<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            return redirect()->intended('admin/quan-li-san-pham'); // khi đã đăng nhập nhưng vẫn cố vào lại trang admin
        }

        return $next($request);
    }
}
