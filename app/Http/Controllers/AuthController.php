<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Product;
use App\Statistic;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Admin;//sử dụng model Admin để tương tác với AuthController
use App\Roles;//sử dụng model Roles để tương tác với AuthController
use App\Http\Requests\RegisterAddRequest;
use Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
//// hiển thị show_dashboard
//    public function show_dashboard(){
//        return view('admin.dashboard.home_dashboard');
//    }


    public function show_dashboard(){
//Muốn đếm số lượng của một sản phẩm là bao nhiêu  chỉ việc gọi
// model all() tất cả sau đó đển hàm count() là đếm
        //total( tổng số lượng sản phẩm
        $product = Product::all()->count();// câu lệnh truy vấn này dùng để đếm số lượng sản phẩm
        $order = Order::all()->count();
        $customer = Customer::all()->count();


        //câu lẹnh truy vấn hiển thị sản phẩm xem nhiều
        $product_views = Product::latest('views_count','DESC')->take(12)->get();
        return view('admin.dashboard.home_dashboard',compact('product_views','customer','product','order'));
    }


    //Hàm trả về register hiển thị form đăng ký tài khoản auth
    //khi nhấn vào register-auth trả về register
    public function register_auth(){
    	return view('admin.custom_auth.register');
    }

//Ham hiển  thị form login auth
    public function login_auth(){
        return view('admin.custom_auth.login_auth');
    }
    public function logout_auth(){
        Auth::logout();
        //sau khi logout trả về trang đăng nhập
        return redirect('/login-auth')->with('message','Đăng xuất authentication thành công');
    }

    // Hàm xử lý dữ liệu đăng nhập auth
    public function login(Request $request){

        // $data = $request->all();
     //nếu Auth::attempt attempt này cho vào một chuỗi có có đối tượng admin_email yêu cầu $request trỏ đến admin_email
//tương tự admin_password
        //khi đa lấy được dữ liệu từ 2 trường 'admin_email' và 'admin_password' gửi qua  thì sẽ đi so sánh với
        // với 'admin_email' và 'admin_password' trong bảng  admin
        //nếu mật khẩu và email trùng với mật khẩu và email đăng ký thì trả về trang dashboard
        if(Auth::attempt(['admin_email'=>$request->admin_email,'admin_password'=>$request->admin_password ])){
            return redirect('/dashboard');
        }else{
            return redirect('/login-auth')->with('message','Mật khẩu hoặc tài khoản bị sai');
        }

    }
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login-auth')->send();
        }
    }

    //hàm này xử lý dữ liệu nhập vào từ form đăng ký
    public function register(RegisterAddRequest $request){
        //Thì Khi gửi dữ liệu nhập vào từ người dùng qua hàm register này rồi
//Thì mặc định  sẽ đi kiểm tra(RegisterAddRequest) xem cái $request( yêu cầu)
// ($request này là tất cả $data gửi qua xem đúng yêu cầu chưa )

		//nếu dữ liệu $data gửi qua đã đúng yêu cầu($request) thì
        // biến $data = yêu cầu ($request) lấy ra tất cả all();
		$data = $request->all();

		//kế tiếp lấy dữ liệu
        //câu lệnh truy vấn $admin = new Admin(); nghĩa là sẽ insert dữ liệu mới là new Admin()
        // vào model Admin
		$admin = new Admin();
		//câu lệnh truy vấn $admin->admin_name = $data['admin_name'];là
        //biến $admin trỏ đến thuộc tính admin_name = $data gửi qua là admin_name
		$admin->admin_name = $data['admin_name'];
		$admin->admin_phone = $data['admin_phone'];
		$admin->admin_email = $data['admin_email'];
		// md5($data['admin_password']) là mã hóa password
		$admin->admin_password = md5($data['admin_password']);
		$admin->save();// lưu dữ liệu insert
        //sau khi lưu song thì trả về redirect
		return redirect('/register-auth')->with('message','Đăng ký thành công');

    }
    public function days_order(){
        $sub60days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(60)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $get = Statistic::whereBetween('order_date',[$sub60days,$now])->orderBy('order_date','ASC')->get();


        foreach($get as $key => $val){

            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );

        }

        echo $data = json_encode($chart_data);
    }


//lọc bằng Ajax  Biểu đồ doanh số theo ngày tuần tháng năm
    public function dashboard_filter(Request $request){

        $data = $request->all();

        // $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        // $tomorrow = Carbon::now('Asia/Ho_Chi_Minh')->addDay()->format('d-m-Y H:i:s');
        // $lastWeek = Carbon::now('Asia/Ho_Chi_Minh')->subWeek()->format('d-m-Y H:i:s');
        // $sub15days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(15)->format('d-m-Y H:i:s');
        // $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->format('d-m-Y H:i:s');

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();



        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();



        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();//toDateString() có nghĩa là format theo order-date là năm trước đến tháng rồi đến ngày

        if($data['dashboard_value']=='7ngay'){

            $get = Statistic::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();

        }elseif($data['dashboard_value']=='thangtruoc'){

            $get = Statistic::whereBetween('order_date',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('order_date','ASC')->get();

        }elseif($data['dashboard_value']=='thangnay'){

            $get = Statistic::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();

        }
        else{
            $get = Statistic::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
        }



// khi lọc song rồi thì thực hiện lặp hàm $get
        foreach($get as $key => $val){

            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }

        echo $data = json_encode($chart_data);

    }


    ////lấy được giá trị sử dụng ajax để gửi giá trị qua controller bằng
///  //url cái route là '/filter-by-date' để in ra giá trị biểu đồ
//    public function filter_by_date(Request $request){
//
//        $data = $request->all();
//
//        $from_date = $data['from_date'];
//        $to_date = $data['to_date'];
//            // $get = Statistic(model) để lấy thông số ra hiển thị (những Thông số
//        //trong bảng Statistic có từ đưn hàng chi tiết và đơn hàng
//        // câu lệnh slq whereBetween là điều kiện giưa từ khoảng này đến khoảng kia
//        //thì sẽ tìm từ ngày $from_date đến ngày $to_date là một chuỗi trong ngoặc [] ->orderBy sắp xếp theo kiểu tăng dần (ASC)và get()
//        $get = Statistic::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
//
//
//        foreach($get as $key => $val){
//// sau khi lấy được giữa liệu rồi cho vào $chart_data[]
//            $chart_data[] = array(
//
//                'period' => $val->order_date,  //'period' là một khoảng thời gian có nghĩa là order_date,
//                'order' => $val->total_order,// tổng đơn hàng
//                'sales' => $val->sales,//sales = doanh số
//                'profit' => $val->profit,//profit lợi nhuận ( lợi nhuận nhỏ hơn doanh số )
//                'quantity' => $val->quantity//quantity là số lượng đã bán ngày hôm đó
//            );
//        }
//
//        // có dữ liệu rồi trả về kiểu json sau đó trả về kiểu dữ liệu
//        echo $data = json_encode($chart_data);
//
//    }


    public function filter_by_date(Request $request){

        $data = $request->all();

        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Statistic::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();


        foreach($get as $key => $val){

            $chart_data[] = array(

                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }

        echo $data = json_encode($chart_data);

    }



}
