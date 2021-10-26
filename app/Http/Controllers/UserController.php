<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Roles;
use App\Admin;
use Auth;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // hàm index này hiển thị user Roles (vai trò)
    public function index()
    {
   //khai báo biến $admin  = Model Admin::with với roles orderBy( sắp xếp theo admin_id DESC là tăng dần
        $admin = Admin::with('roles')->orderBy('admin_id','ASC')->paginate(5);
        //đầu tiên trả về hàm fordel admin sau đó vào fordel user sau đó vào file all_users
        return view('admin.users.all_users',compact('admin'));
    }
//Hàm chuyển quyền
    public function impersonate($admin_id){
        $user = Admin::where('admin_id',$admin_id)->first();
        if($user){
            session()->put('impersonate',$user->admin_id);
        }
        return redirect('/users');
    }
    public function impersonate_destroy(){
        session()->forget('impersonate');
        return redirect('/users');
    }
    public function add_users(){
        return view('admin.users.add_users');
    }
    public function delete_user_roles($admin_id){
//nếu mà lấy được id từ auth = với admin_id truyền vào
        if(Auth::id()==$admin_id){
            return redirect()->back()->with('message','Bạn không được quyền xóa chính mình');
        }
        $admin = Admin::find($admin_id);//câu lệnh truy vấn này vào Model Admin tìm admin_id tương thích

        if($admin){
            $admin->roles()->detach();
            $admin->delete();
        }
        return redirect()->back()->with('message','Xóa user thành công');

    }

    //hàm assign_roles xử lý cấp quyền trong danh sách vai trò user
    public function assign_roles(Request $request){
 //đăng nhập bằng tài khoản admin thì sẽ o cho cho phép tự phân quyền chính tài khoản đó
        //tại vì admin_id đăng nhập vào bằng cái admin_id
        if(Auth::id()==$request->admin_id){
            return redirect()->back()->with('message','Bạn không được phân quyền chính mình');
        }
 // đầu tiên khởi tạo biến $user lấy ra các user từ model Admin điều kiện là admi_email
        //Thì Khi mà chọn checkbok vào quyền  content (chỉnh sửa nội dung)
        // sau đó click vào button (phần quyền ) thì sẽ
        // lấy cái emali là lehung.@gmail.com ở danh sách vai trò user
        // đem đi so sánh với cái email lehung.@gmail.com trong
        // cở sở dữ liệu bảng admin (như hình dưới ) sau đó chỉ lấy ra một cái
        //first() là lấy ra một cái đầu tiên
        $user = Admin::where('admin_email',$request->admin_email)->first();

        //sau đó vào cái  $user->roles()->detach()
        // detach() là hàm tách các quyền hiện tại có ra
        $user->roles()->detach();

        //Khi tách các quyền hiện tại có ra  song rồi thì kiểm tra
        //nếu mà $request (yêu cầu ) có admin_role
        if($request->admin_role){
            //thì sẽ thực thi cậu lệnh đầu tiên cấp quyền admin
            //có nghĩa là vào user thêm cái quyền với quyền admin vào
           $user->roles()->attach(Roles::where('name','admin')->first());
        }
        if($request->user_role){
           $user->roles()->attach(Roles::where('name','user')->first());
        }
        if($request->dev_role){
           $user->roles()->attach(Roles::where('name','dev')->first());
        }
        if($request->content_role){
            $user->roles()->attach(Roles::where('name','content')->first());
        }
        //sau khi thêm các quyền hiển thị ra thông báo message cấp quyền thành công
        return redirect()->back()->with('message','Cấp quyền thành công');
    }



    public function store_users(Request $request){
        $data = $request->all();
        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();
        //        dd($admin);
        $admin->roles()->attach(Roles::where('name','user')->first());


        Session::put('message','Thêm users thành công');
        return Redirect::to('users');
    }




}
