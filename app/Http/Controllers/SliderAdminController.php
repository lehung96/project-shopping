<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\SliderAddRequest;
use App\Slider;
use Illuminate\Http\Request;
use Session;
use DB;
use Storage;
session_start();
class SliderAdminController extends Controller
{
    public function index() {
        $sliders = Slider::paginate(10);

        return view('admin.slider.index',compact('sliders'));
    }
    public function create() {
        return view('admin.slider.add');
    }


    public function store(SliderAddRequest $request){
        // khai bảo biết $data  để lưu một mảng
        $data = array();
        // mình sẽ lấy  dữ liệu theo biến cột ở phía form thêm category
        // lấy   name     = yêu cầu product_name
        // lấy product_name gửi qua data từ khóa là key name dựa vào column
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['content_time'] = $request->content_time;
        $data['description'] = $request->description;
        $data['discount'] = $request->discount;


        // them hinh anh
        $get_image = $request->file('image_name');
        //nếu if tồn tại cái $get_image tức là kiểm tra xem có phải người dùng thêm ảnh hay ko
        // và kiểm tra ảnh đó kích thước bao nhiêu mới được upload
        // mặc định ảnh khi người dùng tải lên sẽ vào thư mục upload
        // nếu người dùng up ảnh từ máy tính
        if($get_image){

            // đặt tên ảnh tính chuẩn seo sử dụng hàm getClientOriginalName(); mặc định lấy mình name
            $get_name_image = $get_image->getClientOriginalName();
            // hàm current(explode('.',$get_name_image)); dấu '.' nó phân tách chuổi = dấu .
            // hàm current có nghĩa là dùng để phân tách ra 2 chuỗi ,
            // ví dụ 2 chuỗi là anh.jpg thì sẽ phân tách anh và jpg
            $name_image = current(explode('.',$get_name_image));
            // sử dụng rand thì khi ảnh up sẽ ko trùng nhau
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            // hàm getClientOriginalExtension(); lấy đuôi mở rộng , có thể là jpg, png
            // khi lấy đuôi ảnh mở rộng tiếp tục khai báo biến $get_image
            // biến $get_image trỏ đến hàm move tức là di chuyển thư mục upload sau đó sẽ gửi $new_image
            $get_image->move('public/uploads/slider/',$new_image);
            // khai báo thêm một biến $data['image']
            // nếu chọn ảnh thì sẽ vào trường image
            $data['image_name']= $new_image;

            // sau đó sẽ insert vào cơ sở dữ liệu và table
            DB::table('sliders')->insert($data);
            // sẽ đặt một cái session message( thông báo)
            Session::put('message','Thêm slider thành công');
            //viết cái message hiển thị bên phía add
            // khi thêm thành công thì trả về return về index category
            return redirect()->route('slider.index');
        }
        //Nếu người dùng ko chọn ảnh thì sẽ cho  $data['image']= null rỗng;
        $data['image_name']= '';
        // sau khi mình đã lấy được dữ liệu mình thử in ra xem đã lấy được hay chưa echo ra
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        // tiếp theo mình sẽ insert vào cơ sở dữ liệu
        DB::table('sliders')->insert($data);
        // sẽ đặt một cái session message( thông báo)
        Session::put('message','Thêm slider thành công');
        //viết cái message hiển thị bên phía add
        // khi thêm thành công thì trả về return về index category
        return redirect()->route('slider.index');
    }
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        // khai bảo biết $data  để lưu một mảng
        $data = array();
        // mình sẽ lấy  dữ liệu theo biến cột ở phía form thêm category
        // lấy   name     = yêu cầu product_name
        // lấy product_name gửi qua data từ khóa là key name dựa vào column
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['content_time'] = $request->content_time;
        $data['description'] = $request->description;
        $data['discount'] = $request->discount;
//        $data['status'] = $request->pro_status;
        // update hinh anh

        $get_image = $request->file('image_name');
        // nếu người dùng up ảnh từ máy tính
        if($get_image){

            // đặt tên ảnh tính chuẩn seo sử dụng hàm getClientOriginalName(); mặc định lấy mình name
            $get_name_image = $get_image->getClientOriginalName();
            // hàm current(explode('.',$get_name_image)); dấu '.' nó phân tách chuổi = dấu .
            // hàm current có nghĩa là dùng để phân tách ra 2 chuỗi ,
            // ví dụ 2 chuỗi là anh.jpg thì sẽ phân tách anh và jpg
            $name_image = current(explode('.',$get_name_image));
            // sử dụng rand thì khi ảnh up sẽ ko trùng nhau
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            // hàm getClientOriginalExtension(); lấy đuôi mở rộng , có thể là jpg, png
            // khi lấy đuôi ảnh mở rộng tiếp tục khai báo biến $get_image
            // biến $get_image trỏ đến hàm move tức là di chuyển thư mục upload sau đó sẽ gửi $new_image
            $get_image->move('public/uploads/slider/',$new_image);
            // khai báo thêm một biến $data['image']
            // nếu chọn ảnh thì sẽ vào trường image
            $data['image_name']= $new_image;

            // sau đó sẽ update vào cơ sở dữ liệu và table vời điều kiện where product_id
            // và bằng cái $id truyền vào trong hàm update
            DB::table('sliders')->where('id',$id)->update($data);
            // update($data); truyền vào $data update dựa vào số cột và name đã lấy
            // sẽ đặt một cái session message( thông báo)
            Session::put('message','cập nhật slider thành công');
            //viết cái message hiển thị bên phía add
            // khi thêm thành công thì trả về return về index category
            return redirect()->route('slider.index');
        }
        //Nếu người dùng ko chọn ảnh thì sẽ  để nguyên  image

        // sau khi mình đã lấy được dữ liệu mình thử in ra xem đã lấy được hay chưa echo ra
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        // tiếp theo mình sẽ update vào cơ sở dữ liệu
        DB::table('sliders')->where('id',$id)->update($data);
        // sẽ đặt một cái session message( thông báo)
        Session::put('message','cập nhật slider thành công');
        //viết cái message hiển thị bên phía add
        // khi thêm thành công thì trả về return về index category
        return redirect()->route('slider.index');


    }


}
