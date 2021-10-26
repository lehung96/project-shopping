<?php

namespace App\Http\Controllers;

use App\Attributes;
use App\CatePost;
use App\Customer;
use App\OrderDetails;
use App\Statistic;
use Illuminate\Http\Request;

use App\Cart;
use App\Category;
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

use Illuminate\Support\Facades\Redirect;
use Session;

// khai báo namespace để biết nó nằm trong đường dẫn như thế nào
use DB;
use Storage;
use App\Order;
use App\Order_details;
use App\Shipping;
use PDF;

session_start();

class OrderController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    //Hàm hiển thị thông tin order
//	public function manage_order(){
//	    // trong bảng order có trường customer_id thì sẽ join với bảng customers
//        $all_order = Order::join('customers','orders.customer_id','=','customers.customer_id')
//            ->select('orders.*','customers.customer_name')
//            ->orderby('orders.order_id','desc')->paginate(5);
//        $manager_order  = view('admin.manageorder.manage_order',compact('all_order'));
//        return view('backend.layout')->with('admin.manageorder.manage_order', $manager_order);
//	}
    //Hàm xử lý Xem chi tiết đơn hàng mang order_code
    public function view_order($order_code)
    {
// định nghĩa  $order_details = model Order_details với product điều kiện là order_code bằng biến $order_code gửi qua
        $order_details = Order_details::with('product')->where('order_code', $order_code)->get();

        // Lấy ra Tên đăng nhập dựa vào cái customer_id
        // thì sẽ foreach

        //trong bảng order chứa customer_di, lấy ra được thông tin khách hàng đăng nhập
        $getorder = Order::where('order_code', $order_code)->get();
        // where điều kiên order_code của hóa đơn = $order_code mà gửi qua để so sánh và lấy ra
        //lấy ra được các trường customer_id, shipping_id,order_status
        foreach ($getorder as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
//            $order_status = $ord->order_status;
        }
        //$customer lấy  ra thông tin đăng nhập bên view_order.blade.php
        $customer = Customer::where('customer_id', $customer_id)->first();
        //first(); lấy ra 1 dòng lấy ra một khách hàng dựa trên 1 id

        //$shipping lấy  ra thông tin đăng nhập bên view_order.blade.php
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();

        //$order_details_product lấy chi tiết đơn hàng từ model Order_details với hàm product tạo bên
        // tạo bên model order_detail, where điều kiện order_code = $order_code truyền vào
        $order_details_product = Order_details::with('product')->where('order_code', $order_code)->get();
        return view('admin.manageorder.view_order', compact('getorder','customer', 'shipping', 'order_details', 'order_details_product'));
    }
    //Hàm xử lý update sản phẩm trong kho
    public function update_order_qty(Request $request){
        //dòng code này update order đơn hàng đã xử lý
        //lấy toàn bộ
        $data = $request->all();
        //update tình trạng đơn hàng trước
        //find có ngĩa là tìm id của order dựa trên $data gửi qua là['order_id']
        $order = Order::find($data['order_id']);
        //sau đó update order_status dựa theo order_status gửi qua
        $order->order_status = $data['order_status'];
        $order->save();

        //order date
        $order_date = $order->order_date;//câu lệnh truy vấn này lấy ra
        // $order_date = $order->order_date; có nghĩa là lấy ra order_date đơn hàng (ngày đặt hàng )
        //sau đó đem đi so sánh với $statistic = model Statistic điều
        // kiện là where order_date',$order_date có nghĩa là lấy order_date (ngày đặt
        //hàng ở bảng order đi so sánh với order_date ngày đơn hàng có trong bảng statistical /sờ tích cồ( thống kê)
        $statistic = Statistic::where('order_date',$order_date)->get();
        //sau đó kiểm tra
        // if($statistic) có nghĩa là nếu có ngày tồn tại trong
        // cái bảng statistical ( thống kê này ) thì sẽ count() đếm cái statistical này
        if($statistic){
            $statistic_count = $statistic->count();// câu lệnh truy vấn này sẽ count() đếm cái statistical này
        }else{
            // ngược lại trả về bằng =
            $statistic_count = 0;
        }


        //cập nhật số lượng
        // sau khi update song
        //nếu trường order_status== 2 có nghĩa là đã xử lý đã giao hàng sẽ lấy số lượng kho còn (-) trừ đi số lượng cập nhật

        if($order->order_status==2){
            //khởi tạo biến ban đầu gán giá trị $total_order = 0
            //các biến này dùng để thống kê đơn hàng
            $total_order = 0;//có nghĩa là có nghĩa là tất cả đều =0
            $sales = 0;
            $profit = 0;
            $quantity = 0;

            // số lượng là một array(mảng ký tự) sử dụng vòng lặp foreach để lấy ra các phần tử trong mảng
            foreach($data['order_product_id'] as $key => $product_id){

                //trong vòng lặp này chạy lấy ra được sản phẩm dựa vào $product_id
                $product = Product::find($product_id);// câu lệnh truy vấn này lấy ra số lượng tồn kho dựa trên product_id
                $product_quantity = $product->product_quantity;  //$product_quantity là số lượng của sản phẩm = $product(bằng số lượng trong bảng sản phẩm )-> trỏ đến trường product_quantity
                // sau khi có số lượng rồi
                // tiếp theo khai báo $product_sold là đã bán
                $product_sold = $product->product_sold;


            // trong câu lệnh  $product_price = $product->product_price; , cái biến $product là biến model  câu lệnh này   $product = Product::find($product_id);
                //sau đó suy ra giá sản phẩm để mình lấy giá *(nhân ) cho số lượng ra doanh thu
                $price = $product->price;
                //giảm giá
                $product_promontion_price = $product->promontion_price;
                //sử dụng Carbon để so sánh ngày đặt hàng trong bảng statistical
                $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

                //sử dụng vòng lặp foreach để lấy ra số lượng
                foreach($data['quantity'] as $key2 => $qty){

                    // trong vòng lặp số lượng này sẽ đi so sánh số lượng sản phẩm kho và số lượng khách đặt
                    // nếu $key= key2 có nghĩa là $key của biến $product_id sẽ chạy theo lần lượt và so sánh
                    //so sánh số lượng và product_id để update số lượng hàng trong kho
                    if($key==$key2){
                        // $pro_remain nghĩa là còn lại =$product_quantity là số lượng của sản phẩm - $qty là đã lấy bên số lượng đã order
                        $pro_remain = $product_quantity - $qty;
                        // khi trừ đi số lượng rồi thì sẽ update số lượng lúc này product_quantity  = $pro_remain
                        $product->product_quantity = $pro_remain;
                        //product_sold chưa bán = 0
                        // nếu product_sold đã bán sẽ = 0 + số lượng đã bán ở cột product_sales_quantity trong bảng order_detail
                        $product->product_sold = $product_sold + $qty;
                        $product->save();//câu lệnh $product->save() là cập nhật database
                        //update doanh thu tính in ra biểu đồ

                        $quantity+=$qty;
                        $total_order+=1;// tổng số sản phẩm đã đặt
                        //$sales doanh thu
                        $sales+=$price*$qty;
                        //$profit tính lợi nhuận
                        $profit=$sales-($product_promontion_price*$qty);
                    }

                }
            }
            //update doanh so db
            if($statistic_count>0){
                $statistic_update = Statistic::where('order_date',$order_date)->first();
                $statistic_update->sales = $statistic_update->sales + $sales;
                $statistic_update->profit =  $statistic_update->profit + $profit;
                $statistic_update->quantity =  $statistic_update->quantity + $quantity;
                $statistic_update->total_order = $statistic_update->total_order + $total_order;
                $statistic_update->save();

            }else{

                $statistic_new = new Statistic();
                $statistic_new->order_date = $order_date;
                $statistic_new->sales = $sales;
                $statistic_new->profit =  $profit;
                $statistic_new->quantity =  $quantity;
                $statistic_new->total_order = $total_order;
                $statistic_new->save();
            }
        }

    }


    // trước khi xóa mề thì phải xóa vĩnh viễn
    // hàm xoá mềm softdelete


    public function deleteOrder_code($order_code)
    {
      Order::where('order_code',$order_code)->delete();
        Session::put('message','Xóa đơn hàng thành công');
        return Redirect::to('manage-order');
    }

    // hàm list khôi phục
    public function order_trash()
    {
//        $pro_trash = Product::onlyTrashed()->paginate(6);
        $orders_trash = Order::onlyTrashed()->join('order_details', 'order_details.order_code', '=', 'order_details.order_code')->orderby('orders.order_id', 'desc')->paginate(10);
        return view('admin.manageorder.trash', compact('orders_trash'));
    }


    //  Quản lý đơn hàng
    public function manage_order()
    {
        //orderby sắp xếp theo thứ tự đơn hàng
        $getorder = Order::orderby('created_at', 'DESC')->paginate(5);// khi xóa mềm dữ liệu ko nằm trong câu truy vấn này nhưng vẫn ở trong bảng csdl
        return view('admin.manageorder.manage_order', compact('getorder'));
    }
    //Tìm kiếm mã đơn hàng
    public function getSearchcode(Request $request){
        $order_code = Order::where('order_code','like','%'.$request->key.'%')->get();
        // kiểm tra để lấy ra sản phẩm cần tìm kiếm
        return view('admin.manageorder.searchcodeorder',compact('order_code'));
    }

    //tạo hàm print_order in đơn hàng
    public function print_order($checkout_code)
    {

        $pdf = \App::make('dompdf.wrapper');
        //$this này là \App::make('dompdf.wrapper');
        //dựa vào cái $checkout_code để lấy ra đơn hàng
        // mỗi đơn hàng có mã đơn hàng sau đó $checkout_code lấy ra
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }

    // khởi tọa hàm print_order_convert() xử lý in file PDF
    public function print_order_convert($checkout_code)
    {
        //dựa vào vào $checkout_code để lấy ra những sản phẩm
        // định nghĩa  $order_details = model Order_details với product điều kiện là order_code bằng biến $order_code gửi qua-> điều kiện order_code lấy đơn hàng chi tiết
        $order_details = Order_details::with('product')->where('order_code', $checkout_code)->get();//câu truy vấn này lấy ra được đơn hàng chi tiết

        // Lấy ra Tên đăng nhập dựa vào cái customer_id
        // thì sẽ foreach

        //trong bảng order chứa customer_di, lấy ra được thông tin khách hàng đăng nhập
        $getorder = Order::where('order_code', $checkout_code)->get();//câu truy vấn này lấy hóa đơn dựa trên mã đơn hàng
        // where điều kiên order_code của hóa đơn = $order_code mà gửi qua để so sánh và lấy ra
        //Sau đó mình foreach
        //lấy ra được các trường customer_id, shipping_id,order_status
        foreach ($getorder as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
            $order_code= $ord->order_code;
        }
        //$customer lấy  ra thông tin đăng nhập bên view_order.blade.php
        $customer = Customer::where('customer_id', $customer_id)->first();
        //first(); lấy ra 1 dòng lấy ra một khách hàng dựa trên 1 id

        //$shipping lấy  ra thông tin gửi hàng bên view_order.blade.php
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();


        $code_order = Order::where('order_code',  $order_code)->first();
        // lấy ra
        //$order_details_product lấy chi tiết đơn hàng từ model Order_details với hàm product tạo bên
        // tạo bên model order_detail để lấy ra sản phẩm , where điều kiện dựa trên order_code = $checkout_code truyền vào
        $order_details_product = Order_details::with('product')->where('order_code', $checkout_code)->get();


        //Tạo Table in ra hóa đơn
        //cho biến $output = ''; bằng rỗng
        $output = '';

        $output .= '<style>body{
			font-family: DejaVu Sans;
		}
		.table-styling{
			border:1px solid #000;
		}
		.table-styling tbody tr td{
			border:1px solid #000;
		}
		</style>

        <h1><centerCông ty TNHH một thành viên ABCD</center></h1>
		<h4><center>Đơn Đặt Hàng Mã đơn  ' . $code_order->order_code . '</center></h4>
		<p>Người đặt hàng</p>
		<p>Ngày đặt hàng: ' . $code_order->created_at. '</p>

        <table class="table-styling">
        <thead>
		<tr>
		<th>Tên khách đặt</th>
		<th>Số điện thoại</th>
		</tr>
		</thead>
			<tbody>';

        $output .= '
		<tr>
		<td>' . $customer->customer_name . '</td>
		<td>' . $customer->customer_phone . '</td>
		</tr>';
        $output .= '
		</tbody>
</table>

<p>Ship hàng tới</p>
		<table class="table-styling">
		<thead>
		<tr>
		<th>Tên người nhận</th>
		<th>Địa chỉ</th>
		<th>Sdt</th>
		<th>Ghi chú</th>
		</tr>
		</thead>
		<tbody>';
//Ship hàng tới nghĩa là thông tin người vận chuyển là thông tin Shipping
        //$shipping lấy  ra thông tin gửi hàng bên view_order.blade.php
        // $shipping = Shipping::where('shipping_id',$shipping_id)->first();
        //lấy biến $shipping gọi đến các trường trong bảng shipping
        $output .= '
		<tr>
		<td>' . $shipping->shipping_name . '</td>
		<td>' . $shipping->shipping_address . '</td>
		<td>' . $shipping->shipping_phone . '</td>
		<td>' . $shipping->shipping_notes . '</td>

		</tr>';


        $output .= '
		</tbody>

		</table>
		<p>Đơn hàng đặt</p>
		<table class="table-styling">
		<thead>
		<tr>
            <th>Tên sản phẩm</th>
            <th>Giá bán</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
		</tr>
		</thead>
		<tbody>';
        $total = 0;

        foreach($order_details as $key => $details){

            $subtotal = $details->product_price*$details->product_sales_quantity;
        $total+=$subtotal;//hoặc  $total=$subtotal+ $subtotal;

            $output.='
			<tr>
			<td>'.$details->product_name.'</td>
			<td>'.$details->product_sales_quantity.'</td>
			<td>'.number_format($details->product_price,0,',','.').'đ'.'</td>
			<td>'.number_format($subtotal,0,',','.').'đ'.'</td>

			</tr>';
        }
        $output.= '<tr>
		<td colspan="2">
		<p>Thanh toán : '.number_format($total,0,',','.').'đ'.'</p>
		</td>
		</tr>';

        $output.='
		</tbody>

		</table>

		<p>Ký tên</p>
		<table>
		<thead>
		<tr>
		<th width="200px">Người lập phiếu</th>
		<th width="800px">Người nhận</th>

		</tr>
		</thead>
		<tbody>';

        $output.='
		</tbody>

		</table>

		';

        return $output;

    }


    //Hàm history lịch sử mua hàng
    public function history(Request $request)
    {


        //kiểm tra nếu người dùng ko có đăng nhập
        if (!Session::get('customer_id')) {
            return Redirect::to('login-checkout');
        } else {
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
            $brand = Attributes::where('name', 'Nhà sản xuất')->get();

            //biến $category_post đổ dử liệu danh mục ra tin tức
            $category_post = CatePost::orderBy('cate_post_id', 'DESC')->get();

            //seo
            $meta_desc = "lịch sử mua hàng";
            $meta_keywords = "lịch sử mua hàng";
            $meta_title = "lịch sử mua hàng";
            $url_canonical = $request->url();
            //--seo

            //orderby sắp xếp theo thứ tự đơn hàng
            $getorder = Order::where('customer_id', Session::get('customer_id'))->orderby('order_date', 'DESC')->paginate(5);// khi xóa mềm dữ liệu ko nằm trong câu truy vấn này nhưng vẫn ở trong bảng csdl
            return view('pages.history.index', compact('getorder', 'category_post', 'brand', 'meta_desc', 'meta_keywords', 'meta_title', 'url_canonical', 'product_cate_kit', 'product_cate', 'newProduct', 'productsRecommend', 'sliders', 'htmlOption', 'menusLimit', 'cart'));
        }
    }

        //hàm xem chi tiết lịch sử đơn hàng
    public function view_history(Request $request,$order_code)
    {


        //kiểm tra nếu người dùng ko có đăng nhập
        if (!Session::get('customer_id')) {
            return Redirect::to('login-checkout');
        } else {
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
            $brand = Attributes::where('name', 'Nhà sản xuất')->get();

            //biến $category_post đổ dử liệu danh mục ra tin tức
            $category_post = CatePost::orderBy('cate_post_id', 'DESC')->get();

            //seo
            $meta_desc = "lịch sử mua hàng";
            $meta_keywords = "lịch sử mua hàng";
            $meta_title = "lịch sử mua hàng";
            $url_canonical = $request->url();
            //--seo
            //---Xem chi tiết lịch sử đơn hàng //
            //orderby sắp xếp theo thứ tự đơn hàng
            // định nghĩa  $order_details = model Order_details với product điều kiện là order_code bằng biến $order_code gửi qua
            $order_details = Order_details::with('product')->where('order_code', $order_code)->get();

            // Lấy ra Tên đăng nhập dựa vào cái customer_id
            // thì sẽ foreach

            //trong bảng order chứa customer_di, lấy ra được thông tin khách hàng đăng nhập
            $getorder = Order::where('order_code', $order_code)->get();
            // where điều kiên order_code của hóa đơn = $order_code mà gửi qua để so sánh và lấy ra
            //lấy ra được các trường customer_id, shipping_id,order_status
            foreach ($getorder as $key => $ord) {
                $customer_id = $ord->customer_id;
                $shipping_id = $ord->shipping_id;
//            $order_status = $ord->order_status;
            }
            //$customer lấy  ra thông tin đăng nhập bên view_order.blade.php
            $customer = Customer::where('customer_id', $customer_id)->first();
            //first(); lấy ra 1 dòng lấy ra một khách hàng dựa trên 1 id

            //$shipping lấy  ra thông tin đăng nhập bên view_order.blade.php
            $shipping = Shipping::where('shipping_id', $shipping_id)->first();

            //$order_details_product lấy chi tiết đơn hàng từ model Order_details với hàm product tạo bên
            // tạo bên model order_detail, where điều kiện order_code = $order_code truyền vào
            $order_details_product = Order_details::with('product')->where('order_code', $order_code)->get();
            return view('pages.history.view_history', compact('customer', 'shipping', 'order_details', 'order_details_product','getorder', 'category_post', 'brand', 'meta_desc', 'meta_keywords', 'meta_title', 'url_canonical', 'product_cate_kit', 'product_cate', 'newProduct', 'productsRecommend', 'sliders', 'htmlOption', 'menusLimit', 'cart'));
        }
    }


    public function getCategory($parentId)
    {
        $data = $this->category->all();//all(); là lấy ra tất cả các trường trong table categories
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
}

