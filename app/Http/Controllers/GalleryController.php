<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use DB;
//use Auth;
//use Session;
//use App\Gallery;// kết nối giữa model (cơ sở dữ liệu) với controller
//use App\Http\Requests;
//use Illuminate\Support\Facades\Redirect;
//session_start();
//class GalleryController extends Controller
//{
////    public function AuthLogin(){
////        $admin_id = Auth::id();
////        if($admin_id){
////            return Redirect::to('dashboard');
////        }else{
////            return Redirect::to('admin')->send();
////        }
////    }
//    //Hàm thêm gallery(ảnh )
//    public function add_gallery($product_id){
//       	$pro_id = $product_id;
//    	return view('admin.gallery.add_gallery')->with(compact('pro_id'));
//
//    }
//    public function update_gallery_name(Request $request){
//    	$gal_id = $request->gal_id;
//    	$gal_text = $request->gal_text;
//    	$gallery = Gallery::find($gal_id);
//	    $gallery->gallery_name = $gal_text;
//		$gallery->save();
//    }
//
//    //Hàm Thêm Hình ảnh
//    public function insert_gallery(Request $request,$pro_id){
//        //đầu tiên dùng câu lệnh truy vấn $get_image = $request->file('file');
//        // khợi tạo một biến $get_image bằng $request yều trỏ đến tên name="file[]" ở bên add_gallery
//    	$get_image = $request->file('file');// câu lệnh này lấy ra file ảnh
//    	//nếu có ảnh ( nếu $get_image)
//    	if($get_image){
//
//    		foreach($get_image as $image){// chạy theo vòng lặp
//    			$get_name_image = $image->getClientOriginalName();// lấy hình ảnh
//	            $name_image = current(explode('.',$get_name_image));// lấy hình ảnh
//	            $new_image =  $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();// lấy đuôi mở rộng ảnh
//	            $image->move('public/uploads/gallery',$new_image);// lưu vào thư mục góc $new_image  là với tên mới
//	           	$gallery = new Gallery();// khởi tạo $gallery  = model Gallery
//	           	$gallery->gallery_name = $new_image;// câu lện truy vấn này lấy ra trường name trong csdl
//	           	$gallery->gallery_image = $new_image;// câu lện truy vấn này lấy ra trường gallery_image trong csdl
//	           	$gallery->product_id = $pro_id;// câu lện truy vấn này lấy ra trường product_id trong csdl
//	           	$gallery->save();//sau đó lưu lại
//    		}
//    	}
//    	Session::put('message','Thêm thư viện ảnh thành công');
//	    return redirect()->back();
//
//    }
//    public function delete_gallery(Request $request){
//    	$gal_id = $request->gal_id;
//    	$gallery = Gallery::find($gal_id);
//	    unlink('public/uploads/gallery/'.$gallery->gallery_image);
//	    $gallery->delete();
//    }
//
//    public function update_gallery(Request $request){
//        $get_image = $request->file('file');
//        $gal_id = $request->gal_id;
//        if($get_image){
//            $gallery = Gallery::find($gal_id);
//            unlink('public/uploads/gallery/'.$gallery->gallery_image);
//            $get_name_image = $get_image->getClientOriginalName();
//            $name_image = current(explode('.',$get_name_image));
//            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
//            $get_image->move('public/uploads/gallery',$new_image);
//            $gallery->gallery_image = $new_image;
//            $gallery->save();
//
//        }
//    }
//// hàm select_gallery() Hiển thị hình ảnh  Đã lấy được hình ảnh rồi (Phần liệt kê hình ảnh)
//    public function select_gallery(Request $request){
////            	echo $request->pro_id;
//    	$product_id = $request->pro_id;
//    	// câu lệnh này truy vấn lấy ra những hình ảnh thuộc product_id của sản phẩm đó
//    	$gallery = Gallery::where('product_id',$product_id)->get();// get() là lấy hết
//
//    	$gallery_count = $gallery->count();// câu truy vấn này dùng đếm số ảnh lấy ra
//    	$output = ' <form>
//    					'.csrf_field().'
//
//    					<table class="table table-hover">
//                                    <thead>
//                                      <tr>
//                                      	<th>Thứ tự</th>
//                                        <th>Tên hình ảnh</th>
//                                        <th>Hình ảnh</th>
//                                        <th>Quản lý</th>
//                                      </tr>
//                                    </thead>
//                                    <tbody>
//
//    	';
//    	if($gallery_count>0){// nếu $gallery_count>0 có nghĩa là có ảnh thuộc cái product_id đó
//    		$i = 0;// biến đếm i ban đầu bằng 0
//
//    		foreach($gallery as $key => $gal){
//    			$i++;// biến $i++ là lấy ra thứ tự ảnh
//    			$output.='
//
//    				 <tr>
//    				 					<td>'.$i.'</td>
//                                        <td contenteditable class="edit_gal_name" data-gal_id="'.$gal->gallery_id.'">'.$gal->gallery_name.'</td>
//                                        <td>
//
//                                        <img src="'.url('public/uploads/gallery/'.$gal->gallery_image).'" class="img-thumbnail" width="120" height="120">
//
//                                            <input type="file" class="file_image" style="width:40%" data-gal_id="'.$gal->gallery_id.'
//                                            " id="file-'.$gal->gallery_id.'" name="file" accept="image/*" />
//
//                                        </td>
//                                        <td>
//                                        	<button type="button" data-gal_id="'.$gal->gallery_id.'" class="btn btn-xs btn-danger delete-gallery">Xóa</button>
//                                        </td>
//                                      </tr>
//
//
//    			';
//    		}
//    	}else{// ngược lại nếu không có ảnh thuộc id đó thì in ra Sản phẩm chưa thư viện ảnh
//    		$output.='
//    				 <tr>
//                                        <td colspan="4">Sản phẩm chưa thư viện ảnh</td>
//
//                                      </tr>
//
//
//    			';
//
//    	}
//    	$output.='
//    				 </tbody>
//    				 </table>
//    				 </form>
//
//
//    			';
//    	echo $output;
//    }
//}


namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Gallery;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class GalleryController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Auth::id();
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_gallery($product_id)
    {
        $pro_id = $product_id;
        return view('admin.gallery.add_gallery')->with(compact('pro_id'));

    }

    public function update_gallery_name(Request $request)
    {
        $gal_id = $request->gal_id;
        $gal_text = $request->gal_text;
        $gallery = Gallery::find($gal_id);
        $gallery->gallery_name = $gal_text;
        $gallery->save();
    }

    public function insert_gallery(Request $request, $pro_id)
    {
        $get_image = $request->file('file');
        if ($get_image) {
            foreach ($get_image as $image) {
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 99) . '.' . $image->getClientOriginalExtension();
                $image->move('public/uploads/gallery', $new_image);
                $gallery = new Gallery();
                $gallery->gallery_name = $new_image;
                $gallery->gallery_image = $new_image;
                $gallery->product_id = $pro_id;
                $gallery->save();
            }
        }
        Session::put('message', 'Thêm thư viện ảnh thành công');
        return redirect()->back();

    }

    public function delete_gallery(Request $request)
    {
        $gal_id = $request->gal_id;
        $gallery = Gallery::find($gal_id);
        unlink('public/uploads/gallery/' . $gallery->gallery_image);
        $gallery->delete();
    }

    public function update_gallery(Request $request)
    {
        $get_image = $request->file('file');
        $gal_id = $request->gal_id;
        if ($get_image) {
            $gallery = Gallery::find($gal_id);
            unlink('public/uploads/gallery/' . $gallery->gallery_image);
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/gallery', $new_image);
            $gallery->gallery_image = $new_image;
            $gallery->save();

        }
    }

    public function select_gallery(Request $request)
    {
        $product_id = $request->pro_id;
        $gallery = Gallery::where('product_id', $product_id)->get();
        $gallery_count = $gallery->count();
        $output = ' <form>
    					' . csrf_field() . '

    					<table class="table table-hover">
                                    <thead>
                                      <tr>
                                      	<th>Thứ tự</th>
                                        <th>Tên hình ảnh</th>
                                        <th>Hình ảnh</th>
                                        <th>Quản lý</th>
                                      </tr>
                                    </thead>
                                    <tbody>

    	';
        if ($gallery_count > 0) {
            $i = 0;
            foreach ($gallery as $key => $gal) {
                $i++;
                $output .= '

    				 <tr>
    				 					<td>' . $i . '</td>
                                        <td contenteditable class="edit_gal_name" data-gal_id="' . $gal->gallery_id . '">' . $gal->gallery_name . '</td>
                                        <td>

                                        <img src="' . url('public/uploads/gallery/' . $gal->gallery_image) . '" class="img-thumbnail" width="120" height="120">

                                        <input type="file" class="file_image" style="width:40%" data-gal_id="' . $gal->gallery_id . '" id="file-' . $gal->gallery_id . '" name="file" accept="image/*" />

                                        </td>
                                        <td>
                                        	<button type="button" data-gal_id="' . $gal->gallery_id . '" class="btn btn-xs btn-danger delete-gallery">Xóa</button>
                                        </td>
                                      </tr>




    			';
            }
        } else {
            $output .= '
    				 <tr>
                                        <td colspan="4">Sản phẩm chưa thư viện ảnh</td>

                                      </tr>


    			';

        }
        $output .= '
    				 </tbody>
    				 </table>
    				 </form>


    			';
        echo $output;
    }
}
