<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Category;
use App\CatePost;
use App\Components\Recusive;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;// khai báo namespace để biết nó nằm trong đường dẫn như thế nào
use DB;
use Mail;
session_start();
class MailController extends Controller
{

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    //Hàm hiển thị form điền email lấy lại mật khẩu
    public function quen_mat_khau(Request $request){
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        $htmlOption = $this->getCategory($parentId = '');
        //seo
        $meta_desc = "Quên Mật khẩu";
        $meta_keywords = "Quên mật khẩu";
        $meta_title = "Quên mật khẩu";
        $url_canonical = $request->url();

        //--seo

        return view('pages.checkout.forget_pass',compact('category_post','htmlOption','url_canonical','meta_keywords','meta_title','meta_desc'));
    }

    //hàm xử lý gửi email để lấy lại mật khẩu
    public function recovery_pass(Request $request){
        $data =$request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-y');
        $title_mail ="Lấy Lại Mật Khẩu levanhung96.hh@gmail.com".' '.$now;
        $customer = Customer::where('customer_email','=',$data['email_account'])->get();
        foreach($customer  as $key =>$value){
            $customer_id = $value->customer_id;
        }

        if ($customer){
            $count_customer = $customer->count();
            if ($count_customer==0){
                return redirect()->back()->with('error','Email chưa được đăng ký để khôi phục mật khẩu');
            }else{
                $token_random = Str::random();
                $customer = Customer::find( $customer_id);
                $customer->customer_token = $token_random;
                $customer->save();

                //gửi mail
                $to_mail = $data['email_account'];
                $link_reset_pass =url('/update-new-pass?email='.$to_mail.'&token='.$token_random);

                $data = array("name"=>$title_mail,"body"=>$link_reset_pass,'email'=>$data['email_account']);

                Mail::send('pages.checkout.forget_pass_notify',['data'=>$data], function ($message) use ($title_mail,$data){
                    $message->to($data['email'])->subject($title_mail);
                    $message->from($data['email'], $title_mail);
//                    dd($data);
                });
                return redirect()->back()->with('message','gửi Email thành công vui lòng vào email để reset password');
            }

        }
//

    }
    public function update_new_pass(Request $request){

        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        $htmlOption = $this->getCategory($parentId = '');
        //seo
        $meta_desc = "Quên Mật khẩu";
        $meta_keywords = "Quên mật khẩu";
        $meta_title = "Quên mật khẩu";
        $url_canonical = $request->url();

        //--seo
        return view('pages.checkout.new_pass',compact('htmlOption','category_post','url_canonical','meta_desc','meta_title','meta_keywords'));
    }
    public function reset_new_pass(Request $request){

        $data =$request->all();
        $token_random = Str::random();
        $customer = Customer::where('customer_email','=',$data['email'])->where('customer_token','=',$data['token'])->get();
        $count = $customer->count();
        if ($count>0){
            foreach($customer  as $key =>$cus){
                $customer_id = $cus->customer_id;
            }
            $reset = Customer::find( $customer_id);
            $reset->customer_password = md5($data['password_account']);
            $reset->customer_token = $token_random;
            $reset->save();

            return redirect('login-checkout')->with('success','Mật khẩu đã cập nhật mới. Quay lại trang đăng nhập');
        }else{
            return redirect('quen-mat-khau')->with('error','Vui lòng nhập lại email vì link đã quá hạn');
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
