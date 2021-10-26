<?php

namespace App\Http\Middleware;
use Auth;//sử dụng use Auth (Authenticator) để check xem người đó có đăng nhập hay ko
//Kế tiếp là sử dụng use Illuminate\Support\Facades\Route;
// Route; nghĩa là sử dụng cái route kiểm tra xem có quyền gì nhiệm vụ gì
use Illuminate\Support\Facades\Route;

use Closure;

class AccessPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    //Sau đó xuống Hàm function handle
    //Handle có nghĩa là xử lý
    public function handle($request, Closure $next)
    {
 //if(Auth::user() nếu có người dùng đăng nhập
        //   ->có quyền hasAnyRoles(['admin','dev']) thì sẽ trả về return
        //
        if(Auth::user()->hasAnyRoles(['admin','dev'])){
            //trả về return $next($request) trả về $request(yêu cầu ) người dùng khi click vào
            //một đường dẫn nào đó
            return $next($request);
        }
        //nếu ko có quyền admin và quyền, thì sẽ return về trang  dashboard
        return redirect('/dashboard');
    }
}
