<?php

namespace App\Providers;
use App\Category;
use App\Product;
use App\Customer;
use App\Post;
use App\Order;
use App\Video;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Schema::defaultStringLength(191);
        // view trỏ đến muốn share tất cả các trang chúng ta sử dụng composer
        //tất cả các trang hàm composer () chúng ta truyền vào 2 tham số
        //tất cả chúng ta cho * vào
        view()->composer('*',function ($view){
            // trong này mình truyền view sang
            $view->with([
                'categorysLimit' => Category::where('parent_id', 0)->take(10)->get(),
            ]);

            $app_product = Product::all()->count();
//            $app_post = Post::all()->count();
            $app_order = Order::all()->count();
//            $app_video = Video::all()->count();
            $app_customer = Customer::all()->count();
            $app_customer = Customer::all()->count();

            $view->with('app_product', $app_product )->with('app_order', $app_order )->with('app_customer', $app_customer );

        });
    }
}
