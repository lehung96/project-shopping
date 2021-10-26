<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\CatePost;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\RegistrationRequest;
use App\Login;
use App\Social;

//sử dụng model Social
use Carbon\Carbon;
use Socialite;

//sử dụng Socialite
use App\Menu;
use App\Product;
use App\Slider;
use App\City;
use App\Province;
use App\Wards;
use App\Traits\StorageImageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

// khai báo namespace để biết nó nằm trong đường dẫn như thế nào
use DB;
use Storage;
use App\Order;
use App\Order_details;
use App\Shipping;

session_start();

class CheckoutController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

// Tạo hàm hiển thị form login and registration
    public function getlogin_checkout(Request $request)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $htmlOption = $this->getCategory($parentId = '');
        $sliders = Slider::latest()->get();
        //select * form từ bảng categories điều kiện where parent_id =0 tức là danh mục cha
        // muốn lấy ra tất cả danh mục cha phải dùng ->get();, còn lấy ra một danh mục cha dùng first()
        //->take(3) lấy 3 bản ghi lấy 3 cái bất kỳ
        //where('parent_id', 0) điều kiện parent_id  0 lớn nhất
//        $categorysLimit = Category::where('parent_id', 0)->take(12)->get();
        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
        // lấy ra sản phẩm mới nhất hàm lây tít latest() lấy ra những cái mới nhất
        //sử dụng doc laravel eloquen
        // bình thường lây tít latest() ko truyền tham số vào lấy theo trường created_at
        // theo cái desc theo cái sản phẩm nào tạo sau sẽ lên đầu tiên
//        $products = Product::latest()->take(24)->get();
        // đổ dữ liệu sản phẩm mới theo new = 1
        $newProduct = Product::where('new', 1)->get();
        //sử biến $productsRecommend lấy ra sản phẩm nổi bật hay sản phẩm bán chạy
        //latest('views_count', 'desc') đừa tham số vào lấy theo tham số
        $productsRecommend = Product::latest('views_count', 'desc')->take(8)->get();
//        dd($productsRecommend);
        //Hiển thị sản phâm theo danh mục hộp giữ nhiệt
        $product_cate = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id', 19)->take(8)->get();
//        dd($product_cate);
        $product_cate_kit = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id', 3)->take(8)->get();
//        dd($product_cate_kit);
        //seo
        $meta_desc = "Đăng nhập thanh toán";
        $meta_keywords = "Đăng nhập thanh toán";
        $meta_title = "Đăng nhập thanh toán";
        $url_canonical = $request->url();

        //--seo

        //biến $category_post đổ dử liệu danh mục ra tin tức
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        return view('pages.checkout.login_checkout', compact('category_post','meta_desc', 'meta_keywords', 'meta_title', 'url_canonical', 'product_cate_kit', 'product_cate', 'newProduct', 'productsRecommend', 'sliders', 'htmlOption', 'menusLimit', 'cart'));

    }

// tạo Hàm đăng ký (registration) customer
    public function add_customer(RegistrationRequest $request)
    {

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('customers')->insertGetId($data);
        // sau khi lấy dữ liệu
        //sử dụng Session::put phiên đăng kí
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect::to('/checkout');
    }

// Hàm show form đăng ký
    public function registration(Request $request)
    {
        $city = City::orderby('matp', 'ASC')->get();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $htmlOption = $this->getCategory($parentId = '');
        $sliders = Slider::latest()->get();
        //select * form từ bảng categories điều kiện where parent_id =0 tức là danh mục cha
        // muốn lấy ra tất cả danh mục cha phải dùng ->get();, còn lấy ra một danh mục cha dùng first()
        //->take(3) lấy 3 bản ghi lấy 3 cái bất kỳ
        //where('parent_id', 0) điều kiện parent_id  0 lớn nhất
//        $categorysLimit = Category::where('parent_id', 0)->take(12)->get();
        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
        // lấy ra sản phẩm mới nhất hàm lây tít latest() lấy ra những cái mới nhất
        //sử dụng doc laravel eloquen
        // bình thường lây tít latest() ko truyền tham số vào lấy theo trường created_at
        // theo cái desc theo cái sản phẩm nào tạo sau sẽ lên đầu tiên
//        $products = Product::latest()->take(24)->get();
        // đổ dữ liệu sản phẩm mới theo new = 1
        $newProduct = Product::where('new', 1)->get();
        //sử biến $productsRecommend lấy ra sản phẩm nổi bật hay sản phẩm bán chạy
        //latest('views_count', 'desc') đừa tham số vào lấy theo tham số
        $productsRecommend = Product::latest('views_count', 'desc')->take(8)->get();
//        dd($productsRecommend);
        //Hiển thị sản phâm theo danh mục hộp giữ nhiệt
        $product_cate = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id', 19)->take(8)->get();
//        dd($product_cate);
        $product_cate_kit = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id', 3)->take(8)->get();
//        dd($product_cate_kit);
        //seo
        $meta_desc = "Đăng ký Đăng nhập thanh toán";
        $meta_keywords = "Đăng ký  Đăng nhập thanh toán";
        $meta_title = "Đăng ký Đăng nhập thanh toán";
        $url_canonical = $request->url();
        //--seo
        //biến $category_post đổ dử liệu danh mục ra tin tức
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        return view('pages.checkout.registration', compact('category_post','meta_desc', 'meta_keywords', 'meta_title', 'url_canonical', 'city', 'product_cate_kit', 'product_cate', 'newProduct', 'productsRecommend', 'sliders', 'htmlOption', 'menusLimit', 'cart'));
    }

// hàm thực hiện lưu thông tin mua hàng
    public function checkout(Request $request)
    {
        $city = City::orderby('matp', 'ASC')->get();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $htmlOption = $this->getCategory($parentId = '');
        $sliders = Slider::latest()->get();
        //select * form từ bảng categories điều kiện where parent_id =0 tức là danh mục cha
        // muốn lấy ra tất cả danh mục cha phải dùng ->get();, còn lấy ra một danh mục cha dùng first()
        //->take(3) lấy 3 bản ghi lấy 3 cái bất kỳ
        //where('parent_id', 0) điều kiện parent_id  0 lớn nhất
//        $categorysLimit = Category::where('parent_id', 0)->take(12)->get();
        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
        // lấy ra sản phẩm mới nhất hàm lây tít latest() lấy ra những cái mới nhất
        //sử dụng doc laravel eloquen
        // bình thường lây tít latest() ko truyền tham số vào lấy theo trường created_at
        // theo cái desc theo cái sản phẩm nào tạo sau sẽ lên đầu tiên
//        $products = Product::latest()->take(24)->get();
        // đổ dữ liệu sản phẩm mới theo new = 1
        $newProduct = Product::where('new', 1)->get();
        //sử biến $productsRecommend lấy ra sản phẩm nổi bật hay sản phẩm bán chạy
        //latest('views_count', 'desc') đừa tham số vào lấy theo tham số
        $productsRecommend = Product::latest('views_count', 'desc')->take(8)->get();
//        dd($productsRecommend);
        //Hiển thị sản phâm theo danh mục hộp giữ nhiệt
        $product_cate = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id', 19)->take(8)->get();
//        dd($product_cate);
        $product_cate_kit = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id', 3)->take(8)->get();
//        dd($product_cate_kit);
        $meta_desc = "Đăng nhập thanh toán";
        $meta_keywords = "Đăng nhập thanh toán";
        $meta_title = "Đăng nhập thanh toán";
        $url_canonical = $request->url();
        //--seo
        //biến $category_post đổ dử liệu danh mục ra tin tức
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

        return view('pages.checkout.show_checkout', compact('category_post','meta_desc', 'meta_keywords', 'meta_title', 'url_canonical', 'city', 'product_cate_kit', 'product_cate', 'newProduct', 'productsRecommend', 'sliders', 'htmlOption', 'menusLimit', 'cart'));
    }

    // lưu thông tin gửi hàng
    public function save_checkout_customer(Request $request)
    {
//        $data = array();
//        $data['shipping_name'] = $request->shipping_name;
//        $data['shipping_phone'] = $request->shipping_phone;
//        $data['shipping_notes'] = $request->shipping_notes;
//        $data['shipping_address'] = $request->shipping_address;
//        $shipping_id = DB::table('shippings')->insertGetId($data);
//
//        Session::put('shipping_id',$shipping_id);
//
//        return Redirect::to('/payment');
    }

    //Hàm sử lý thanh toán
    public function payment(Request $request)
    {
        $city = City::orderby('matp', 'ASC')->get();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $htmlOption = $this->getCategory($parentId = '');
        $sliders = Slider::latest()->get();
        //select * form từ bảng categories điều kiện where parent_id =0 tức là danh mục cha
        // muốn lấy ra tất cả danh mục cha phải dùng ->get();, còn lấy ra một danh mục cha dùng first()
        //->take(3) lấy 3 bản ghi lấy 3 cái bất kỳ
        //where('parent_id', 0) điều kiện parent_id  0 lớn nhất
//        $categorysLimit = Category::where('parent_id', 0)->take(12)->get();
        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
        // lấy ra sản phẩm mới nhất hàm lây tít latest() lấy ra những cái mới nhất
        //sử dụng doc laravel eloquen
        // bình thường lây tít latest() ko truyền tham số vào lấy theo trường created_at
        // theo cái desc theo cái sản phẩm nào tạo sau sẽ lên đầu tiên
//        $products = Product::latest()->take(24)->get();
        // đổ dữ liệu sản phẩm mới theo new = 1
        $newProduct = Product::where('new', 1)->get();
        //sử biến $productsRecommend lấy ra sản phẩm nổi bật hay sản phẩm bán chạy
        //latest('views_count', 'desc') đừa tham số vào lấy theo tham số
        $productsRecommend = Product::latest('views_count', 'desc')->take(8)->get();
//        dd($productsRecommend);
        //Hiển thị sản phâm theo danh mục hộp giữ nhiệt
        $product_cate = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id', 19)->take(8)->get();
//        dd($product_cate);
        $product_cate_kit = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id', 3)->take(8)->get();
//        dd($product_cate_kit);

        //seo
        $meta_desc = "Đăng nhập thanh toán";
        $meta_keywords = "Đăng nhập thanh toán";
        $meta_title = "Đăng nhập thanh toán";
        $url_canonical = $request->url();
        //--seo

        return view('pages.checkout.payment', compact('meta_desc', 'meta_keywords', 'meta_title', 'url_canonical', 'city', 'product_cate_kit', 'product_cate', 'newProduct', 'productsRecommend', 'sliders', 'htmlOption', 'menusLimit', 'cart'));

    }

    // hàm Xử lý đặt hàng
    public function order_place(Request $request)
    {
//        //insert vào csdl payment, lấy ra hình thức thanh toán
        $data = array();
        //lấy dữ liệu hình thức thanh toán payment_option bên form thanh toán
        //insert dữ liệu hình thức thanh toán payment_method = payment_option
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        // đặt biến là  $payment_id sẽ insert và trong csdl là payments
        $payment_id = DB::table('payments')->insertGetId($data);

//        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');//Khi mà mình đăng nhập sẽ có customer_id
        $order_data['shipping_id'] = Session::get('shipping_id');//điền Cái thông tin gửi hàng thì sẽ có shipping_id

        $order_data['payment_id'] = $payment_id;//$payment_id  insert rồi thì mặc định mình sẽ có $payment_id
        $order_data['order_total'] = (Session::get('cart')->totalPrice);
        $order_data['order_status'] = 'Đang chờ xử lý';
        //$checkout_code rand (ngẫu nhiên ) tự tạo ra số và chữ sau đó lấy ra 5 số bất kỳ
//        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);//dòng này tự tạo ra mã code
//        $order_data['order_code'] = $checkout_code;// tự động tạo mã
        $order_id = DB::table('orders')->insertGetId($order_data);

//        //insert order_details

        if (Session::has('cart') != null)

            foreach (Session::get('cart')->items as $item) {// ví dụ lấy 10 sản phẩm
//               dd(Session::get('cart')->items);
                // sẽ chạy vòng lặp đủ 10 sản phẩm
//                $checkout_code = substr(md5(microtime()), rand(0, 26), 5);//dòng này tự tạo ra mã code
                // tự động tạo mã
//                $order_d_data['order_code'] = $checkout_code;
                $order_d_data['product_id'] = $item['item']->product_id;// product_id trong chi tiết giỏ hàng
                $order_d_data['product_name'] = $item['item']->product_name;
                $order_d_data['product_price'] = $item['item']->price;
                $order_d_data['product_sales_quantity'] = $item['quanty'];
                DB::table('order_details')->insert($order_d_data);

            }
        //nếu $data['payment_method']==1
        if ($data['payment_method'] == 1) {

            echo 'Thanh toán ví paypal';

//        }elseif($data['payment_method']==2){
//            Cart::destroy();
//
//
//            return view('pages.checkout.handcash');

        } else {
//            $item->delete();

//            Session::has('cart')::destroy();// hủy phiên(giả phòng tất cả sản phẩm mà khách hàng đã mua sản phẩm rồi
            //sau đó trả về trang handcash

            $city = City::orderby('matp', 'ASC')->get();
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $htmlOption = $this->getCategory($parentId = '');
            $sliders = Slider::latest()->get();
            //select * form từ bảng categories điều kiện where parent_id =0 tức là danh mục cha
            // muốn lấy ra tất cả danh mục cha phải dùng ->get();, còn lấy ra một danh mục cha dùng first()
            //->take(3) lấy 3 bản ghi lấy 3 cái bất kỳ
            //where('parent_id', 0) điều kiện parent_id  0 lớn nhất
//        $categorysLimit = Category::where('parent_id', 0)->take(12)->get();
            $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
            // lấy ra sản phẩm mới nhất hàm lây tít latest() lấy ra những cái mới nhất
            //sử dụng doc laravel eloquen
            // bình thường lây tít latest() ko truyền tham số vào lấy theo trường created_at
            // theo cái desc theo cái sản phẩm nào tạo sau sẽ lên đầu tiên
//        $products = Product::latest()->take(24)->get();
            // đổ dữ liệu sản phẩm mới theo new = 1
            $newProduct = Product::where('new', 1)->get();
            //sử biến $productsRecommend lấy ra sản phẩm nổi bật hay sản phẩm bán chạy
            //latest('views_count', 'desc') đừa tham số vào lấy theo tham số
            $productsRecommend = Product::latest('views_count', 'desc')->take(8)->get();
//        dd($productsRecommend);
            //Hiển thị sản phâm theo danh mục hộp giữ nhiệt
            $product_cate = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id', 19)->take(8)->get();
//        dd($product_cate);
            $product_cate_kit = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id', 3)->take(8)->get();
//        dd($product_cate_kit);
            //seo
            $meta_desc = "thanh toán";
            $meta_keywords = "thanh toán";
            $meta_title = "thanh toán";
            $url_canonical = $request->url();
            //--seo

            return view('pages.checkout.handcash', compact('meta_desc', 'meta_keywords', 'meta_title', 'url_canonical', 'city', 'product_cate_kit', 'product_cate', 'newProduct', 'productsRecommend', 'sliders', 'htmlOption', 'menusLimit', 'cart'));

        }

//        return Redirect::to('/payment');
    }

//xác nhận đơn hàng
    public function confirm_order(Request $request)
    {

        $data = $request->all();
        //lưu thông tin đơn hàng
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        // khi seva song tự động hiều rằng
        //cái $shipping_id hiểu tự động lấy ra trường shipping_id mới nhất , vừa mới thêm
        // để cho vào shipping_id bên bảng order
        $shipping_id = $shipping->shipping_id;

        //tự động tạo ra random chữ và số sau đó lấy ra 5 chữ số bất kỳ
        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);

        //Tiếp theo mình save tiếp đơn hàng order
        // khởi tạo biến $order = model order mới
        $order = new Order;
        $order->customer_id = Session::get('customer_id');//lấy customer_id người dùng
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;//order_status = 1 là đơn hàng mới
        //order_code của đơn hàng sẽ so sánh với order_code của chi tiết đơn hàng để lấy ra các trường sản phẩm đã đặt
        $order->order_code = $checkout_code;// có dõng mã code tự động tạo ra mã code

        // date_default_timezone_set dùng để thiết lặp múi giờ cho hệ thống
        //Thì mặc định sẽ format về múi giờ 7
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now();// hàm now();là bây giờ trong laravel được viết sẵn bắt ngày / tháng/ năm
        // và giờ hiện tại mình click thêm vào
//        date_default_timezone_set('Asia/Ho_Chi_Minh');
//        // $order->created_at = now();
//        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');

 // tạo biến $order_date Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');format về ngày đặt hàng
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
//        // $order->created_at = date("d-m-Y H:i:s");
//        $order->created_at = $today;

        $order->order_date = $order_date;//câu lệnh truy vấn này thêm cột order_date =$order_date;
        $order->save();

        //Nếu tồi Session cart tồn tại giỏ hàng
        if (Session::has('cart') != null)
            //mô tả vòng lặp chạy sản phẩm
            // sản phẩm đầu tiên thêm vào
            //tiếp tục sản phẩm thứ cũng được thêm vào
            foreach (Session::get('cart')->items as $item) {
                // thì mỗi sản phẩm phải chạy cái order_details = new Order_details;
                // sản phẩm thứ nhất gọi cái model và thêm sản phẩm thứ nhất vào Order_details
                // sản phẩm thứ 2 gọi cái model và thêm sản phẩm thứ 2 vào Order_details
                $order_details = new Order_details;
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $item['item']['product_id'];// lấy ra cái Session Cart thêm vào
                $order_details->product_name = $item['item']['product_name'];
                $order_details->product_price = $item['item']['price'];
                $order_details->product_sales_quantity = $item['quanty'];
                $order_details->save();
            }

        // khi thêm song vào giỏ hàng rồi
        //Session::forget('cart'); xóa đi cái giỏ hàng
        Session::forget('cart');
    }

// hàm này thực hiện việc khi người dùng đăng xuất
    public function logout_checkout()
    {
        Session::forget('customer_id');
//        return redirect()->route('/login-checkout');
        return Redirect::to('/login-checkout');
    }

    // hàm này thực hiện việc đăng nhập customer
    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        // khi lấy được mật khẩu ở form đăng nhập sẽ mã hóa thành md5 và so sánh với trường
        // so sánh với trường customer_password ở bảng customers đúng chuỗi mã  hóa password hày ko
        $password = md5($request->password_account);
        // khai báo biến kết quả( $result )= bảng customers để so sánh điều kiện customer_email, và  customer_password
        //first(); lấy dòng đầu tiên
        $result = DB::table('customers')->where('customer_email', $email)->where('customer_password', $password)->first();

        // nếu mà có kết quả = true thì sẽ tạo một Session trả về trang checkout
        if ($result) {

            Session::put('customer_id', $result->customer_id);
            return Redirect::to('/checkout');
        } else {
            // ngược lại trả về trang đăng nhập
            return Redirect::to('/login-checkout');
        }
        Session::save();

    }

    // Hàm xử lý đăng nhập bằng facebook

// hàm đầu tiên là login facebook , khi người dùng chọn đăng nhập là login facebook thì
// sẽ trả về  facebook và redirect() tới trang callback

//    public function login_facebook(){
//        return Socialite::driver('facebook')->redirect();
//    }
//
//    public function callback_facebook(){
//        $provider = Socialite::driver('facebook')->user();
//        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
//        if($account){
//            //login in vao trang quan tri
//            $account_name = Login::where('customer_id',$account->user)->first();
//            Session::put('customer_name',$account_name->customer_name);
//            Session::put('customer_id',$account_name->customer_id);
//            return redirect('/home')->with('message', 'Đăng nhập thành công');
//        }else{
//
//            $hieu = new Social([
//                'provider_user_id' => $provider->getId(),
//                'provider' => 'facebook'
//            ]);
//
//            $orang = Login::where('admin_email',$provider->getEmail())->first();
//
//            if(!$orang){
//                $orang = Login::create([
//                    'customer_name' => $provider->getName(),
//                    'customer_email' => $provider->getEmail(),
//                    'customer_password' => '', //password để rỗng tại vì login bằng facebook
//                    'customer_phone' => ''
//
//                ]);
//            }
//            $hieu->login()->associate($orang);
//            $hieu->save();
//
//            $account_name = Login::where('customer_id',$account->user)->first();
//            Session::put('customer_name',$account_name->customer_id);
//            Session::put('customer_id',$account_name->customer_id);
//            return redirect('/home')->with('message', 'Đăng nhập thành công');
//        }
//    }

//    public function delivery(Request $request){
//        $oldCart = Session::has('cart') ? Session::get('cart') :null;
//        $cart = new Cart($oldCart);
//        $htmlOption = $this->getCategory($parentId = '');
//        $sliders = Slider::latest()->get();
//        //select * form từ bảng categories điều kiện where parent_id =0 tức là danh mục cha
//        // muốn lấy ra tất cả danh mục cha phải dùng ->get();, còn lấy ra một danh mục cha dùng first()
//        //->take(3) lấy 3 bản ghi lấy 3 cái bất kỳ
//        //where('parent_id', 0) điều kiện parent_id  0 lớn nhất
////        $categorysLimit = Category::where('parent_id', 0)->take(12)->get();
//        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
//        // lấy ra sản phẩm mới nhất hàm lây tít latest() lấy ra những cái mới nhất
//        //sử dụng doc laravel eloquen
//        // bình thường lây tít latest() ko truyền tham số vào lấy theo trường created_at
//        // theo cái desc theo cái sản phẩm nào tạo sau sẽ lên đầu tiên
////        $products = Product::latest()->take(24)->get();
//        // đổ dữ liệu sản phẩm mới theo new = 1
//        $newProduct =Product::where('new',1)->get();
//        //sử biến $productsRecommend lấy ra sản phẩm nổi bật hay sản phẩm bán chạy
//        //latest('views_count', 'desc') đừa tham số vào lấy theo tham số
//        $productsRecommend = Product::latest('views_count', 'desc')->take(8)->get();
////        dd($productsRecommend);
//        //Hiển thị sản phâm theo danh mục hộp giữ nhiệt
//        $product_cate = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id',19)->take(8)->get();
////        dd($product_cate);
//        $product_cate_kit = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id',3)->take(8)->get();
////        dd($product_cate_kit);
//
//        $city = City::orderby('matp','ASC')->get();
//
//
//        return view('pages.checkout.show_checkout',compact('city','product_cate_kit','product_cate','newProduct','productsRecommend','sliders','htmlOption','menusLimit','cart'));
//    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();//all(); là lấy ra tất cả các trường trong table categories
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
//    public function select_delivery(Request $request){
//        //$request lấy tất cả dữ liệu gủi qua
//        $data = $request->all();
//        // nếu có $data action rồi
//        if($data['action']){
//            // khởi tạo biến $output = rỗng là chuỗi nối
//            $output = '';
//            //nếu $data['action'] == thành phố/ tỉnh
//            if($data['action']=="city"){
//                // đều kiện mã thành phố , phải bằng cái $data['matp'] gửi qua từ js là matp và xếp theo mã quận huyện
//                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
//                $output.='<option>---Chọn quận huyện---</option>';
//                foreach($select_province as $key => $province){
//                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
//                }
//
//            }else{
//
//                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
//                $output.='<option>---Chọn xã phường---</option>';
//                foreach($select_wards as $key => $ward){
//                    $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
//                }
//            }
//            echo $output;
//        }
//
//    }
}
