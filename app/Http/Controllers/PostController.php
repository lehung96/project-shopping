<?php

namespace App\Http\Controllers;

use App\Attributes;
use App\Cart;
use App\Category;
use App\Components\Recusive;
use App\Menu;
use App\Product;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Slider;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Post;
use App\CatePost;
session_start();
class PostController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_post(){
        $this->AuthLogin();
        $cate_post = CatePost::orderBy('cate_post_id','DESC')->get();

        return view('admin.post.add_post')->with(compact('cate_post'));


    }
    public function save_post(Request $request){
        $this->AuthLogin();
    	$data = $request->all();
    	$post = new Post();

    	$post->post_title = $data['post_title'];
    	$post->post_slug = $data['post_slug'];
    	$post->post_desc = $data['post_desc'];
    	$post->post_content = $data['post_content'];
    	$post->post_meta_desc = $data['post_meta_desc'];
    	$post->post_meta_keywords = $data['post_meta_keywords'];
    	$post->cate_post_id = $data['cate_post_id'];
    	$post->post_status = $data['post_status'];

        $get_image = $request->file('post_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.',$get_name_image));

            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/uploads/post',$new_image);

            $post->post_image = $new_image;

           	$post->save();
            Session::put('message','Thêm bài viết thành công');
            return redirect()->back();
        }else{
        	Session::put('message','Làm ơn thêm hình ảnh');
            return redirect()->back();
        }


    }
    public function all_post(){
        $this->AuthLogin();

    	$all_post = Post::with('cate_post')->orderBy('cate_post_id')->get();

    	return view('admin.post.list_post')->with(compact('all_post',$all_post));

    }
    public function delete_post($post_id){
        $this->AuthLogin();
        $post = Post::find($post_id);
        $post_image = $post->post_image;

        if($post_image){
        	$path ='public/uploads/post/'.$post_image;
        	unlink($path);
        }
        $post->delete();


        Session::put('message','Xóa bài viết thành công');
        return redirect()->back();
    }

   	public function edit_post($post_id){
   		$cate_post = CatePost::orderBy('cate_post_id')->get();
   		$post = Post::find($post_id);
   		return view('admin.post.edit_post')->with(compact('post','cate_post'));
   	}
   	public function update_post(Request $request,$post_id){
   		$this->AuthLogin();
    	$data = $request->all();
    	$post = Post::find($post_id);

    	$post->post_title = $data['post_title'];
    	$post->post_slug = $data['post_slug'];
    	$post->post_desc = $data['post_desc'];

    	$post->post_content = $data['post_content'];
    	$post->post_meta_desc = $data['post_meta_desc'];
    	$post->post_meta_keywords = $data['post_meta_keywords'];
    	$post->cate_post_id = $data['cate_post_id'];

    	$post->post_status = $data['post_status'];

        $get_image = $request->file('post_image');

        if($get_image){
        	//xoa anh cu
        	$post_image_old = $post->post_image;
        	$path ='public/uploads/post/'.$post_image_old;
        	unlink($path);
        	//cap nhat anh moi
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);
            $post->post_image = $new_image;
        }

        $post->save();
        Session::put('message','Cập nhật bài viết thành công');
        return redirect()->back();
   	}
    public function danh_muc_bai_viete(Request $request,$post_slug){
        //category post
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        //slide
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
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
        $newProduct =Product::where('new',1)->get();
        //sử biến $productsRecommend lấy ra sản phẩm nổi bật hay sản phẩm bán chạy
        //latest('views_count', 'desc') đừa tham số vào lấy theo tham số
        $productsRecommend = Product::latest('views_count', 'desc')->take(8)->get();
//        dd($productsRecommend);
        //Hiển thị sản phâm theo danh mục hộp giữ nhiệt
        $product_cate = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id',19)->take(8)->get();
//        dd($product_cate);
        $product_cate_kit = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id',3)->take(8)->get();
//        dd($product_cate_kit);
        $brand= Attributes::where('name','Nhà sản xuất')->get();
        $catepost = CatePost::where('cate_post_slug',$post_slug)->take(1)->get();

        foreach($catepost as $key => $cate){
            //seo
            $meta_desc = $cate->cate_post_desc;
            $meta_keywords = $cate->cate_post_slug;
            $meta_title = $cate->cate_post_name;
            $cate_id = $cate->cate_post_id;
            $url_canonical = $request->url();
            //--seo
        }

        $post_cate = Post::with('cate_post')->where('post_status',0)->where('cate_post_id',$cate_id)->paginate(5);

        return view('pages.baiviet.danhmucbaiviet', compact('category_post','post_cate','brand','meta_desc','meta_keywords','meta_title','url_canonical','product_cate_kit','product_cate','newProduct','productsRecommend','sliders','htmlOption','menusLimit','cart'));
    }


//    public function bai_viet(Request $request,$post_slug){
//
//        //category post
//        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
//        //slide
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
//        $brand= Attributes::where('name','Nhà sản xuất')->get();
////        $catepost = CatePost::where('cate_post_slug',$post_slug)->take(1)->get();
//        $post_by_id = Post::with('cate_post')->where('post_status',0)->where('post_slug',$post_slug)->take(1)->get();
//        foreach( $post_by_id as $key => $p){
//            //seo
//            $meta_desc = $p->post_meta_desc;
//            $meta_keywords = $p->post_meta_keywords;
//            $meta_title = $p->post_title;
//            $cate_post_id = $p->cate_post_id;
//            $cate_id = $p->cate_post_id;
//            $url_canonical = $request->url();
//            //--seo
//        }
//
//
//
//        return view('pages.baiviet.baiviet', compact('cate_post_id','cate_id','category_post','brand','meta_desc','meta_keywords','meta_title','url_canonical','product_cate_kit','product_cate','newProduct','productsRecommend','sliders','htmlOption','menusLimit','cart'));
//    }
    // hàm này để dùng chung với create và edit
    public function getCategory($parentId)
    {
        $data = $this->category->all();//all(); là lấy ra tất cả các trường trong table categories
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }


    public function danh_muc_bai_viet(Request $request,$post_slug){
        //category post
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        $htmlOption = $this->getCategory($parentId = '');
        //slide
        $sliders = Slider::latest()->get();


        $catepost = CatePost::where('cate_post_slug',$post_slug)->take(1)->get();

        foreach($catepost as $key => $cate){
            //seo
            $meta_desc = $cate->cate_post_desc;
            $meta_keywords = $cate->cate_post_slug;
            $meta_title = $cate->cate_post_name;
            $cate_id = $cate->cate_post_id;
            $url_canonical = $request->url();
            //--seo
        }

        $post_cate = Post::with('cate_post')->where('post_status',0)->where('cate_post_id',$cate_id)->paginate(5);

        return view('pages.baiviet.danhmucbaiviet',compact('post_cate','category_post','sliders','htmlOption','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function bai_viet(Request $request,$post_slug){

        //category post
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        //slide
        $htmlOption = $this->getCategory($parentId = '');
        //slide
        $sliders = Slider::latest()->get();

        $post_by_id = Post::with('cate_post')->where('post_status',0)->where('post_slug',$post_slug)->take(1)->get();

        foreach($post_by_id as $key => $p){
            //seo
            $meta_desc = $p->post_meta_desc;
            $meta_keywords = $p->post_meta_keywords;
            $meta_title = $p->post_title;
            $cate_id = $p->cate_post_id;
            $url_canonical = $request->url();
            $cate_post_id = $p->cate_post_id;

            //--seo
        }
//        //update views
//        $post = Post::where('post_id',$post_id)->first();
//        $post->post_views = $post->post_views + 1;
//        $post->save();

        //related post
        $related = Post::with('cate_post')->where('post_status',0)->where('cate_post_id',$cate_post_id)->whereNotIn('post_slug',[$post_slug])->take(5)->get();
        $post_new = Post::latest('post_status', 'desc')->take(3)->get();
        return view('pages.baiviet.baiviet',compact('post_new','related','post_by_id','category_post','sliders','htmlOption','meta_desc','meta_keywords','meta_title','url_canonical'));
    }

}
