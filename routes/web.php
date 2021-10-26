<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/trang-chu','HomeController@index');
Route::get('/404','HomeController@error_page');
Route::post('/tim-kiem','HomeController@search');
Route::get('/yeu-thich','HomeController@yeu_thich	');
//Backend //

////// đăng nhập
////Route::get('/admin','AuthController@login_auth');
//Route::get('/dashboard','AdminController@show_dashboard');
//
//Route::get('/admin','AdminController@loginAdmin');
//Route::post('/dashboard','AdminController@postLoginAdmin');
////dashboard là trang quản lý , khi tìm kiếm dashboard thì sẽ vào AdminController và gọi đến function show_dashboard
//Route::post('/dashboard','AdminController@show_dashboard');
////Route::post('/admin-dashboard','AdminController@dashboard');



//Route::post('admin/pages/login',[
//    'as'=>'admin.pages.postLogin',
//    'uses'=>'UserController@postLogin'
//]);

Route::prefix('admin')->group(function () {
//category
    // muốn all cái route về category nó sẽ được prefix về category
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
//        'middleware' => 'can:category-list'
        ]);
        //route này là show ra form add
        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create',
//        'middleware' => 'can:category-add'
        ]);

        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit',
//        'middleware' => 'can:category-edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);
        //định nghĩa define
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete'
//        'middleware' => 'can:category-delete'
        ]);
        //định nghĩa define khôi phục xóa mềm
        Route::get('/trash', [
            'as' => 'categories.trash',
            'uses' => 'CategoryController@trash'
//        'middleware' => 'can:category-delete'
        ]);
        // khôi phục xóa mềm
        Route::get('/untrash/{id}', [
            'as' => 'categories.untrash',
            'uses' => 'CategoryController@untrash'
//        'middleware' => 'can:category-delete'
        ]);
        // xóa vĩnh viễn
        Route::get('/fordel/{id}', [
            'as' => 'categories.fordel',
            'uses' => 'CategoryController@fordel'
//        'middleware' => 'can:category-delete'
        ]);


        //active (kích hoạt hiển thị)
        Route::get('/unactive/{category_id}', [
            'as' => 'categories.unactive',
            'uses' => 'CategoryController@unactive',
//        'middleware' => 'can:category-add'
        ]);
        //active (kích hoạt hiển thị truyền vào một tham số category_id)
        Route::get('/active/{category_id}', [
            'as' => 'categories.active',
            'uses' => 'CategoryController@active',
//        'middleware' => 'can:category-add'
        ]);

       // export-csv(xuất dữ liệu ra file Excel)
        Route::post('/export-csv', [
            'as' => 'categories.export-csv',
            'uses' => 'CategoryController@export_csv'
        ]);
        // import-csv(nhập dữ liệu từ file Excel)
        Route::post('/import-csv', [
            'as' => 'categories.import-csv',
            'uses' => 'CategoryController@import_csv'
        ]);

    });

    //products
    // muốn all cái route về product nó sẽ được prefix về product

    //
    Route::prefix('products')->group(function () {
        Route::get('/', [
            'as' => 'products.index',// khi gọi đến route này mình sẽ cái admin ProductController
            'uses' => 'ProductController@index',// với phương thức là index

        ]);
        //route này là show ra form add
        Route::get('/create', [
            'as' => 'products.create',
            'uses' => 'ProductController@create',

        ])->middleware('auth.roles');

        Route::post('/store', [
            'as' => 'products.store',
            'uses' => 'ProductController@store'
        ])->middleware('auth.roles');

        Route::get('/edit/{id}', [
            'as' => 'products.edit',
            'uses' => 'ProductController@edit',

        ]) ->middleware('auth.roles');

        Route::post('/update/{id}', [
            'as' => 'products.update',
            'uses' => 'ProductController@update'
        ]);
        //định nghĩa define
        Route::get('/delete/{id}', [
            'as' => 'products.delete',
            'uses' => 'ProductController@delete'
//        'middleware' => 'can:category-delete'
        ]);
        //định nghĩa define khôi phục xóa mềm
        Route::get('/trash', [
            'as' => 'products.trash',
            'uses' => 'ProductController@trash'

        ]);
        // khôi phục xóa mềm
        Route::get('/untrash/{id}', [
            'as' => 'products.untrash',
            'uses' => 'ProductController@untrash'

        ]);
        // xóa vĩnh viễn
        Route::get('/fordel/{id}', [
            'as' => 'products.fordel',
            'uses' => 'ProductController@fordel'

        ]);

        //active (kích hoạt hiển thị)
        Route::get('/unactive/{pro_id}', [
            'as' => 'products.unactive',
            'uses' => 'ProductController@unactive',

        ]);
        //active (kích hoạt hiển thị truyền vào một tham số category_id)
        Route::get('/active/{pro_id}', [
            'as' => 'products.active',
            'uses' => 'ProductController@active',

        ]);

        // export-csv(xuất dữ liệu ra file Excel)
        Route::post('/export-csv', [
            'as' => 'products.export-csv',
            'uses' => 'ProductController@export_csv'
        ]);
        // import-csv(nhập dữ liệu từ file Excel)
        Route::post('/import-csv', [
            'as' => 'products.import-csv',
            'uses' => 'ProductController@import_csv'
        ]);



    });



    //menus
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            //as là một cái link
            'as' => 'menus.index',
            'uses' => 'MenuController@index',
//            'middleware' => 'can:menu-list'

        ]);
        //Ỏ ĐÂY SẼ TẠO MỘT CÁI CREATE GỌI ĐẾN CÁI MENUS.CREARE
        Route::get('/create', [
            //khi create mình sẽ có cái route ra form create bằng cái menus.create
            //sang bên phần thẻ <a href="{{ route('menus.create') }}
            'as' => 'menus.create',
            'uses' => 'MenuController@create'
        ]);
        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'MenuController@store'
        ]);

        //route này là show ra form update
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'MenuController@edit'
        ]);
        // đây là nhấn submit nó sẽ post lên cái route này
        // sẽ dùng cái route menus.update sang bên form edit để gắn vào

        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'MenuController@update'
        ]);
//        Route::get('/delete/{id}', [
//            'as' => 'menus.delete',
//            'uses' => 'MenuController@delete'
//        ]);
        //định nghĩa define
        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'MenuController@delete'
//        'middleware' => 'can:category-delete'
        ]);
        //định nghĩa define khôi phục xóa mềm
        Route::get('/trash', [
            'as' => 'menus.trash',
            'uses' => 'MenuController@trash'
//        'middleware' => 'can:category-delete'
        ]);
        // khôi phục xóa mềm
        Route::get('/untrash/{id}', [
            'as' => 'menus.untrash',
            'uses' => 'MenuController@untrash'
//        'middleware' => 'can:category-delete'
        ]);
        // xóa vĩnh viễn
        Route::get('/fordel/{id}', [
            'as' => 'menus.fordel',
            'uses' => 'MenuController@fordel'
//        'middleware' => 'can:category-delete'
        ]);

    });

    // Slider
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'SliderAdminController@index'
        ]);

        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'SliderAdminController@create'
        ]);

        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'SliderAdminController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'SliderAdminController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'SliderAdminController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'SliderAdminController@delete'
        ]);


    });


    // User
    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'AdminUserController@index'
        ]);
        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'AdminUserController@create'
        ]);
        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'AdminUserController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'AdminUserController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'AdminUserController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'users.delete',
            'uses' => 'AdminUserController@delete'
        ]);

    });

    // attributes( thuộc tính)
    Route::prefix('attributes')->group(function () {
        Route::get('/', [
            'as' => 'attributes.index',
            'uses' => 'AttributesController@index'
        ]);
        Route::get('/create', [
            'as' => 'attributes.create',
            'uses' => 'AttributesController@create'
        ]);
        Route::post('/store', [
            'as' => 'attributes.store',
            'uses' => 'AttributesController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'attributes.edit',
            'uses' => 'AttributesController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'attributes.update',
            'uses' => 'AttributesController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'attributes.delete',
            'uses' => 'AttributesController@delete'
        ]);

    });




    //roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'AdminRoleController@index'
        ]);
        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'AdminRoleController@create'
        ]);
        Route::post('/store', [
            'as' => 'roles.store',
            //AdminRoleController @ gọi đến pương thức store
            'uses' => 'AdminRoleController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'AdminRoleController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'AdminRoleController@update'
        ]);


    });

    //backand brand
// tất cả các route về brand nó sẽ được prefix về brands
    Route::prefix('brands')->group(function () {
        // trong này để mình đưa vào cái mảng  để sau này mình có thể sử dụng middleware
        Route::get('/', [
            //as là tên route
            'as' => 'brands.index',
            // có key là user sử dụng BrandController action là index
            'uses' => 'BrandController@index',
//        'middleware' => 'can:category-list'
        ]);
        Route::get('/create', [
            'as' => 'brands.create',
            'uses' => 'BrandController@create',
//        'middleware' => 'can:category-add'
        ]);
        Route::post('/store', [
            'as' => 'brands.store',
            'uses' => 'BrandController@store'
        ]);


        Route::get('/edit/{id}', [
            'as' => 'brands.edit',
            'uses' => 'BrandController@edit',
//        'middleware' => 'can:category-edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'brands.update',
            'uses' => 'BrandController@update'
        ]);
        //định nghĩa define
        Route::get('/delete/{id}', [
            'as' => 'brands.delete',
            'uses' => 'BrandController@delete'
//        'middleware' => 'can:category-delete'
        ]);
        //định nghĩa define khôi phục xóa mềm
        Route::get('/trash', [
            'as' => 'brands.trash',
            'uses' => 'BrandController@trash'
//        'middleware' => 'can:category-delete'
        ]);
        // khôi phục xóa mềm
        Route::get('/untrash/{id}', [
            'as' => 'brands.untrash',
            'uses' => 'BrandController@untrash'
//        'middleware' => 'can:category-delete'
        ]);
        // xóa vĩnh viễn
        Route::get('/fordel/{id}', [
            'as' => 'brands.fordel',
            'uses' => 'BrandController@fordel'
//        'middleware' => 'can:category-delete'
        ]);


        //active (kích hoạt hiển thị)
        Route::get('/unactive/{category_id}', [
            'as' => 'brands.unactive',
            'uses' => 'BrandController@unactive',
//        'middleware' => 'can:category-add'
        ]);
        //active (kích hoạt hiển thị truyền vào một tham số category_id)
        Route::get('/active/{category_id}', [
            'as' => 'brands.active',
            'uses' => 'BrandController@active',
//        'middleware' => 'can:category-add'
        ]);



    });
    //products
    // muốn all cái route về product nó sẽ được prefix về product
    Route::prefix('sell_slide')->group(function () {
        Route::get('/', [
            'as' => 'Sells-Slides.index',// khi gọi đến route này mình sẽ cái admin ProductController
            'uses' => 'SellSlideController@index',// với phương thức là index

        ]);
        //route này là show ra form add
        Route::get('/create', [
            'as' => 'sellslider.create',
            'uses' => 'SellSlideController@create',

        ]);

        Route::post('/store', [
            'as' => 'sellslider.store',
            'uses' => 'SellSlideController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'sellslider.edit',
            'uses' => 'SellSlideController@edit',

        ]);

        Route::post('/update/{id}', [
            'as' => 'sellslider.update',
            'uses' => 'SellSlideController@update'
        ]);
        //định nghĩa define
        Route::get('/delete/{id}', [
            'as' => 'sellslider.delete',
            'uses' => 'SellSlideController@delete'
//        'middleware' => 'can:category-delete'
        ]);
        //định nghĩa define khôi phục xóa mềm
        Route::get('/trash', [
            'as' => 'products.trash',
            'uses' => 'SellSlideController@trash'

        ]);
        // khôi phục xóa mềm
        Route::get('/untrash/{id}', [
            'as' => 'products.untrash',
            'uses' => 'SellSlideController@untrash'

        ]);
        // xóa vĩnh viễn
        Route::get('/fordel/{id}', [
            'as' => 'products.fordel',
            'uses' => 'SellSlideController@fordel'

        ]);

        //active (kích hoạt hiển thị)
        Route::get('/unactive/{pro_id}', [
            'as' => 'products.unactive',
            'uses' => 'SellSlideController@unactive',

        ]);
        //active (kích hoạt hiển thị truyền vào một tham số category_id)
        Route::get('/active/{pro_id}', [
            'as' => 'produc.active',
            'uses' => 'SellSlideController@active',

        ]);


    });



});

//////---Route phân quyền auth xử lý trong UserController---/////
//vào user thì sẽ vào đến UserController sau đó vào hàm index
Route::get('users','UserController@index')->middleware('auth.roles');

//gửi lựa chọn phân quyền từ form qua sử dụng UserController với hàm assign_roles() xử lý
Route::post('assign-roles','UserController@assign_roles')->middleware('auth.roles');
//hiển thị form thêm user
Route::get('add-users','UserController@add_users')->middleware('auth.roles');
//thêm user
Route::post('store-users','UserController@store_users');
//là Xóa user có nghĩa là xóa luôn admin và xóa luôn cả quyền ở trong bảng admin_route  và cả quyền user
Route::get('delete-user-roles/{admin_id}','UserController@delete_user_roles')->middleware('auth.roles');
// chuyển quyền
Route::get('impersonate/{admin_id}','UserController@impersonate');

Route::get('impersonate-destroy','UserController@impersonate_destroy');

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


//Frontend
// cấu hình Route dưới dạng mảng , as tên route,uses chỉ định cái CategoryController vài action là @index'
//lấy ra sản phẩm thuôc danh mục con cấp 2
//Route::get('/category/{slug}/{id}', [
//    'as' => 'category.product',
//    'uses' => 'CategoryProductController@index'
//]);
//Route::get('/category/{slug}/{id}', [
//    'as' => 'category.index.attribute',
//    'uses' => 'CategoryProductController@indexAttribute'
//]);


Route::prefix('category')->group(function () {
    // trong này để mình đưa vào cái mảng  để sau này mình có thể sử dụng middleware
    Route::get('/{slug}/{id}', [
        //as là tên route
        'as' => 'category.product',
        // có key là user sử dụng BrandController action là index
        'uses' => 'CategoryProductController@index',
//        'middleware' => 'can:category-list'
    ]);
    Route::get('/{slug}/{id}/{order}', [
        'as' => 'category.product.order',
        'uses' => 'CategoryProductController@indexFilterprice',
//        'middleware' => 'can:category-add'
    ]);




});






//lọc sản phẩm theo giá
//Route::get('/{slugname}/{id}','CategoryController@indexOrder')->name('category.index.order');
//lấy ra ra tất cả sản phẩm thuộc danh mục cha
Route::get('/category-parent/{slug}/{allpro_id}', [
    'as' => 'category.allproduct',
    'uses' => 'CategoryProductController@getcategoryallproduct'
]);
//lấy ra sản phẩm thuôc danh mục con cấp 1
//Route::get('/category/{slug}/{cate_id}', [
//    'as' => 'category.pro',
//    'uses' => 'CategoryProductController@getCategoryProduct'
//]);


//lọc ra thường hiệu
//Route::get('/thuong-hieu/{value}','CategoryProductController@show_brand_home');


// route trang home frontend
Route::get('/','HomeController@index' )->name('home');

//Tìm kiếm sản phẩm gửi theo method post
Route::post('/tim-kiem','HomeController@getSearch')->name('search');

// add giỏ hàng
Route::get('/add-to-cart/{product_id}','ShoppingCartController@getAddToCart' );

// add giỏ hàng ở phần chi tiết giỏ hàng và truyền vào id để biết mình thâm cho sản phẩm nào
//Route::post('/add-cart-details/{product_id}','ShoppingCartController@AddCartDetails' )->name('add-cart-details');
Route::post('/add-cart-details/{product_id}', [
    'as' => 'add-cart-details',
    'uses' => 'ShoppingCartController@AddCartDetails'

]);


////cart thêm sản phẩm chi tiết vào giỏ hàng
//Route::post('/save-cart','ShoppingCartController@save_cart');

// xóa giỏ hàng
Route::get('/delete-item-cart/{product_id}','ShoppingCartController@DeleteIteamCart' );

// xóa chi tiết  giỏ hàng
Route::get('/delete-item-list/{product_id}','ShoppingCartController@DeleteListIteamCart' );

//Lưu số lượng sản phẩm cập nhật danh sách giỏ hàng
Route::get('/save-item-list/{product_id}/{quanty}','ShoppingCartController@SaveListCart' );


//cập nhật toàn bộ  số lượng sản phẩm danh sách giỏ hàng
Route::post('/save-all','ShoppingCartController@SaveAllListCart' );

//hiển thị chi tiết sản phẩm xem nhanh
Route::get('/chi-tiet/{product_id}','HomeController@Product_Detail' )->name('products_detail');

// xem chi tiet san pham
Route::get('/chi-tiet-san-pham/{product_id}','HomeController@Product_Detail_view' )->name('products-detail-view');



// route trang ShoppingCart frontend
Route::get('/shopping-list-cart', [
    'as' => 'shopping-list-cart',
    'uses' => 'ShoppingCartController@ShoppingCart'

]);



//Checkout
Route::get('/login-checkout','CheckoutController@getlogin_checkout');
// đăng ký customer
Route::post('/add-customer','CheckoutController@add_customer');
//from đăng ký
Route::get('/dang-ky','CheckoutController@registration');
// đăng nhập customer (khách hàng)
Route::post('/login-customer','CheckoutController@login_customer');
//đăng xuất
Route::get('/logout-checkout','CheckoutController@logout_checkout');

//Login facebook
Route::get('/login-facebook','CheckoutController@login_facebook');
Route::get('/login-checkout/callback','CheckoutController@callback_facebook');

Route::get('/checkout','CheckoutController@checkout');

//lưu thông tin gửi hàng( thực hiện việc insert dữ liệu từ shipping vào csdl
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');

// thanh toán
Route::get('/payment','CheckoutController@payment');
// đặt hàng
Route::post('/order-place','CheckoutController@order_place');
// xác nhận đơn hàng
Route::post('/confirm-order','CheckoutController@confirm_order');

//order
//lich sử mua hàng
Route::get('/history','OrderController@history');
//xem chi tiết lịch sử mua hàng đơn hàng
Route::get('/view-history/{order_code}','OrderController@view_history');
//quản lý đơn hàng ở Admin
Route::get('/manage-order','OrderController@manage_order');
//xem chi tiết đơn hàng
Route::get('/view-order/{order_code}','OrderController@view_order');
//xóa đơn hàng
Route::get('/delete-order/{order_code}','OrderController@deleteOrder_code')->name('delete.order');
//danh sách xóa mềm
Route::get('/orders-trash','OrderController@order_trash')->name('orders.trash');
//tìm kiếm order
Route::get('/tim-kiem-order-code','OrderController@getSearchcode' )->name('search.code');
// Hiển thị in đơn hàng
// phương thức get
Route::get('/print-order/{checkout_code}','OrderController@print_order');
//update số lượng sản phẩm trong kho
Route::post('/update-order-qty','OrderController@update_order_qty');







////Gallery
//Route::get('add-gallery/{product_id}','GalleryController@add_gallery');
//
//// hàm select_gallery() này Đã lấy được hình ảnh rồi (Phần liệt kê hình ảnh)
//Route::post('select-gallery','GalleryController@select_gallery');
////insert-gallery thêm ảnh mảng theo pro_id
//Route::post('insert-gallery/{pro_id}','GalleryController@insert_gallery');
//Route::post('update-gallery-name','GalleryController@update_gallery_name');
//Route::post('delete-gallery','GalleryController@delete_gallery');
//Route::post('update-gallery','GalleryController@update_gallery');


//Gallery
Route::get('add-gallery/{product_id}','GalleryController@add_gallery');
Route::post('select-gallery','GalleryController@select_gallery');
Route::post('insert-gallery/{pro_id}','GalleryController@insert_gallery');
Route::post('update-gallery-name','GalleryController@update_gallery_name');
Route::post('delete-gallery','GalleryController@delete_gallery');
Route::post('update-gallery','GalleryController@update_gallery');

////quản lý thuộc tính ở Admin
//Route::get('/manage-attributes','AttributesController@manage_attributes');

//Route::get('/delete/{order_code}', [
//    'as' => 'orders.delete',
//    'uses' => 'OrderController@deleteOrder_code'
////        'middleware' => 'can:category-delete'
//]);



//Authentication roles phần phân quyền

Route::get('/dashboard','AuthController@show_dashboard');

////lấy được giá trị sử dụng ajax để gửi giá trị qua controller bằng
///  //url cái route là '/filter-by-date' để in ra giá trị biểu đồ
Route::post('/filter-by-date','AuthController@filter_by_date');

//lọc bằng Ajax  Biểu đồ doanh số theo ngày tuần tháng năm
Route::post('/dashboard-filter','AuthController@dashboard_filter');

//hiển thị form đăng ký Auth
Route::get('/register-auth','AuthController@register_auth');

//hiện thị form đăng nhập bằng Auth
Route::get('/login-auth','AuthController@login_auth');

Route::get('/logout-auth','AuthController@logout_auth');
//Gủi dữ liệu from đăng ký bằng phương thức post thì sẽ vào register(đăng ký)
// AuthController xử lý
Route::post('/register','AuthController@register');

// gửi dữ liệu đăng nhập = phương thức post
Route::post('/login','AuthController@login');

//Hàm  này mặc định  tự động chạy lấy ra biểu đồ lọc 30 ngày hoặc 60 ngày
Route::post('/days-order','AuthController@days_order');


//Danh muc san pham trang chu
//xem nhanh sản phẩm
Route::post('/quickview','ProductController@quickview');

Route::get('/comment','ProductController@list_comment');
Route::post('/load-comment','ProductController@load_comment');
Route::post('/send-comment','ProductController@send_comment');
Route::post('/allow-comment','ProductController@allow_comment');
Route::post('/reply-comment','ProductController@reply_comment');
Route::post('/insert-rating','ProductController@insert_rating');
//tìm kiềm autocomplete tự động tìm từ khóa
Route::post('/autocomplete-ajax','HomeController@autocomplete_ajax');


//Category Post

Route::get('/add-category-post','CategoryPost@add_category_post');
Route::get('/all-category-post','CategoryPost@all_category_post');
Route::get('/edit-category-post/{category_post_id}','CategoryPost@edit_category_post');

Route::post('/save-category-post','CategoryPost@save_category_post');
Route::post('/update-category-post/{cate_id}','CategoryPost@update_category_post');
Route::get('/delete-category-post/{cate_id}','CategoryPost@delete_category_post');
//POst

Route::get('/add-post','PostController@add_post');
Route::get('/all-post','PostController@all_post');
Route::get('/delete-post/{post_id}','PostController@delete_post');
Route::get('/edit-post/{post_id}','PostController@edit_post');
Route::post('/save-post','PostController@save_post');
Route::post('/update-post/{post_id}','PostController@update_post');


//Bai viet trang frontend
Route::get('/danh-muc-bai-viet/{post_slug}','PostController@danh_muc_bai_viet')->name('danhmucbaiviet');
Route::get('/bai-viet/{post_slug}','PostController@bai_viet');
//đánh giá sao
Route::post('/insert-rating','HomeController@insert_rating');


//quên mật khẩu front-end
Route::get('/quen-mat-khau','MailController@quen_mat_khau');

Route::get('/update-new-pass','MailController@update_new_pass');

Route::post('/recovery-pass','MailController@recovery_pass');

Route::post('/reset-new-pass','MailController@reset_new_pass');
//<!-- <% allCategory.map(function(ele, index){ %>
  //  <option value="<%= ele.categoryName %>"><%= ele.categoryName %></option>
  //<% }) %> -->