<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;// thêm Blade để sử dụng
use Illuminate\Support\Facades\Auth;// thêm Auth để sử dụng
use App\Admin;//gọi Model Admin  để sử dụng hàm  public function hasAnyRoles($roles)
// và public function hasRole($role) bên phía model Admin

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Đã sử dụng Blade, Auth; Admin ,giờ chỉ cần lấy ra cái class Blade
        //khai báo một Blade
        //nếu cái tên hasrole

        Blade::if('hasrole', function($expression){
            if(Auth::user()){// nếu người dùng có đăng nhập
                //AnyRoles có nghĩa là nhiều quyền
                // cái biến $expression có nghĩa là trường admin , trường user, trường dev ,
                // và trường content

                if(Auth::user()->hasAnyRoles($expression)){//nếu đã đăng nhập ví dụ là user  thì sẽ gọi đên hàm
                    //hasAnyRoles( có nghĩa là quyền) truyền cái biến $expression có nghĩa là trường user
                    //là quyền user
                    return true;//sau đó trả về true có nghĩa là đúng và cho làm những quyền kế tiếp

                }
            }// ngược lại thì return false; có nghĩa là (Auth::user() ko đăng nhập
            //
            return false;
        });
        Blade::if('impersonate',function(){
            if(session()->get('impersonate')){
                return true;
            }
            return false;
        });
    }
}
