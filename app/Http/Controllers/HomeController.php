<?php

namespace App\Http\Controllers;

use App\Attributes;
use App\Cart;
use App\Category;
use App\CatePost;
use App\Gallery;// muốn lấy gallery thì phải sử dụng model Gallery
use App\Components\Recusive;
use App\Menu;
use App\Post;
use App\Product;
use App\Slider;
use App\Rating;
use Illuminate\Database\Eloquent\Model;
use Session;
use DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index(Request $request){

        //seo website
        // biến $meta_desc = "LIMUPA.vn chuyên bán các loại đồ gia dụng..." để google biết là mô tả như thế này
        // phía google sắp xếp vào bộ máy
        $meta_desc = "LIMUPA.vn chuyên bán các loại đồ gia dụng thông minh chính hãng, xuất xứ rõ ràng, giá rẻ nhất thị trường. Các mặt hàng bao gồm: máy pha cà phê, máy làm sữa đậu nành, máy xay ép trái cây, máy lọc nước, máy làm kem, máy làm sữa chua, Các loại nồi hầm, nồi ủ, nồi áp suất, nồi cơm điện, ấm đun nước siêu tốc đến những loại bếp từ, bếp hồng ngoại, máy rửa bát, tủ sấy quần áo, bình giữ nhiệt, cặp lồng cơm...";
        $meta_keywords= "Đồ gia dụng,Gia dụng nhà bếp,Dụng cụ nhà bếp,Dụng cụ nấu ăn,Gia dụng thông minh,máy pha cà phê,máy làm sữa đậu nành,máy xay ép trái cây";
        $meta_title ="Đồ gia dụng thông minh Giá tốt, Chính hãng - LIMUPA.vn";
        $url_canonical = $request->url();//mỗi trang sẽ có một đường link hiện hữu khác nhau;
        // $request->url(); sẽ lấy trang index mà người dùng đang truy cập
        //--seo

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

        //khai báo biến hiển thị sản phẩm thuộc category_53 đồ dùng nhà bếp
        $product_cate_53 = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id',53)->take(8)->get();

        //khai báo biến hiển thị sản phẩm thuộc category_26 đồ vệ sinh làm sạch
        $product_cate_26 = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id',26)->take(8)->get();

        //        dd($product_cate_kit);
        $brand= Attributes::where('name','Nhà sản xuất')->get();

        //biến $category_post đổ dử liệu danh mục ra tin tức
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

        //baì viết mới nhất
        $post_new = Post::latest('post_status', 'desc')->take(3)->get();
        return view('pages.home', compact('product_cate_26','product_cate_53','post_new','category_post','brand','meta_desc','meta_keywords','meta_title','url_canonical','product_cate_kit','product_cate','newProduct','productsRecommend','sliders','htmlOption','menusLimit','cart'));
    }

    //Hàm hiển thị xem nhanh chi tiết sản phẩm
    public function Product_Detail($product_id){
        // in ra cái $priduct_id
//        dd($product_id);
        // trước hết trả về view chúng ta phải select sản phẩm
        //find () chỉ tìm theo khóa chính id
        $pro =Product::find($product_id);
        return view('pages.product.product_detail.list_detail',compact('pro'));
    }
    public function Product_Detail_view( Request $request, $product_id){

        //gallery lấy ra hình ảnh chi tiết sản phẩm
        $gallery = Gallery::where('product_id',$product_id)->get();

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
        $htmlOption = $this->getCategory($parentId = '');
        // Lấy chi tiết sản phẩm
        $details_product = Product::join('categories','categories.category_id','=','products.category_id')
            ->where('products.product_id',$product_id)->get();
//        dd($details_product);

        //khai báo một cái foreach lấy biến details_product mặc định biến này lấy ra được sản phẩm thuộc danh mục
        foreach($details_product as $key => $value){
            $category_id = $value->category_id;

            $product_id = $value->product_id;//câu lệnh này lấy ra product_id của sản phẩm
            //seo
            $meta_desc = $value->product_desc;
            $meta_keywords = $value->product_slug;
            $meta_title = $value->product_name;
            $url_canonical = $request->url();
            //--seo
        }

        //gallery lấy ra hình ảnh chi tiết sản phẩm
        //where điều kiện là product_id trong bảng gallery = $product_id lấy ở trong vòng
        //lặp thuộc $details_product
        $gallery = Gallery::where('product_id',$product_id)->get();

        //update views  xem sản phẩm khi người dùng click vào xem
        //bằng cách lấy ra product dựa vào product_id -> first(); là lấy một sản phẩm ra tại vì xem một sản phẩm ,
        $product = Product::where('product_id',$product_id)->first();
        $product->views_count = $product->views_count + 1;
        //sau đó uptate seve lại
        $product->save();


        //related product(sản phẩm liên quan)
        //lấy ra tất cả sản phẩm thuộc category_id
        //sử dụng hàm whereNotIn , điều kiện lấy những sản phẩm thuộc danh mục đó nhưng
        // chừ ra cái sản phẩm chi tiết đã lấy ra
        //->whereNotIn('products.product_id',$product_id) thuộc products.product_id trừ ra cái $product_id mình đã lấy ra
        $related_product = Product::join('categories','categories.category_id','=','products.category_id')
            ->where('categories.category_id',$category_id)->whereNotIn('products.product_id',[$product_id])->get();
//        $product_name = Product::where('products.product_id',$product_id)->limit(1)->get();
//        foreach($product_name as $key => $val) {
//            //seo
//            $meta_desc = $val->desc;
//            $meta_keywords = $val->meta_keywords;
//            $meta_title = $val->product_name;
//            $url_canonical = $request->url();
//            //--seo
//        }
        //biến $category_post đổ dử liệu danh mục ra tin tức
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

        $rating = Rating::where('product_id',$product_id)->avg('rating');
        $rating = round($rating);


        return view('pages.product.product_detail.viewListDetailProduct',compact('rating','category_post','gallery','meta_desc','meta_keywords','meta_title','url_canonical','related_product','details_product','product_cate_kit','product_cate','newProduct','productsRecommend','sliders','htmlOption','menusLimit','cart'));
    }





    // hàm này để dùng chung với create và edit
    public function getCategory($parentId)
    {
        $data = $this->category->all();//all(); là lấy ra tất cả các trường trong table categories
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    //Hàm sử lý tìm kiếm sản phẩm
    public function getSearch(Request $request){

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

        //tạo biến từ khóa $keywords gửi qua yêu cầu request->sẽ lấy ra từ khóa keywords_submit
        //ở bên trang home
//        $keywords = $request->keywords_sub;
        // tạo biến $search_product thì sẽ vào model product, điều kiện sẽ lấy trường là
        //điều kiện lấy trường product_name, sau đó dùng like, trong sql có 2 trường '%'.$keywords.'%'
        //like','%'.$keywords.'%' là tìm từ khóa  tất cả vị trí nào của product_name
//        $request->validate([
//            'query'=>'required|min:3',
//
//        ]);
//        $request->messages = [
//            'query.min' => 'Tên tìm kiếm không được phép dưới 3 kí tự',
//        ];

        $search_key = $request->input('search_key');
//        $search_pro = Product::where('product_name','like',"%$query%")->paginate(9);
        $search_pro = '';
        if($request->searh_category_id == 0)
        {
            $search_pro = Product::where('product_name','like',"%$search_key%")->paginate(9);
//            $products =Product::where('product_name','like','%'.$request->query.'%')->get();
        }
        else
        {
            $search_pro = Product::where('product_name','like',"%$search_key%")->where('category_id',$request->searh_category_id)->paginate(9);
        }
        $data = [
            'search_pro' => $search_pro
        ];

        //seo
        $meta_desc = "Tìm kiếm sản phẩm";
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
        $url_canonical = $request->url();
        //--seo
        //biến $color = model Attributes với điều kiện
        // where cái name = giá trị là màu sắc muốn lấy dùng hàm get() đấy lấy ra danh sách
        $color = Attributes::where('name','màu sắc')->get();// biến $color lấy ra trường từ model qua bên add product để duyệt dữ liệu
//       dd($color);
        //tượng kích thước
        $capaci = Attributes::where('name','DUNG TÍCH NỒI')->get();
        //tương tự nhà sản xuất
        $brand= Attributes::where('name','Nhà sản xuất')->get();
//            ->orwhere('name','like',"%$query%")->paginate(9);

        //biến $category_post đổ dử liệu danh mục ra tin tức
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        return view('pages.product.search', compact('category_post','brand','capaci','color','meta_desc','meta_keywords','meta_title','url_canonical','search_pro','product_cate_kit','product_cate','newProduct','productsRecommend','sliders','htmlOption','menusLimit','cart','data'));


    }
//hàm tìm kiềm autocomplete tự động tìm từ khóa
    public function autocomplete_ajax(Request $request){
        $data = $request->all();
//bắt tất cả dữ liệu gửi qua từ Ajax
        if($data['query']){

            $product = Product::where('status',0)->where('product_name','LIKE','%'.$data['query'].'%')->get();

            $output = '
            <ul class="dropdown-menu" style="display:block; position:relative">'
            ;

            foreach($product as $key => $val){
                $output .= '
               <li class="li_search_ajax"><a href="#">'.$val->product_name.'</a></li>
               ';
            }

            $output .= '</ul>';
            echo $output;
        }


    }


    // trong hàm này mình truyền vào $id
//    public function addToCart($id){
//
////        session()->forget('cart');
//      $product =Product::find($id);
//      // kiểm tra
//        // nếu cái $cart tồn tại cái biến id rồi
//        // tức là trong cái giỏ hàng có cái cart này được thêm vào rồi
//        $cart = array();
//        if (isset($cart[$id]))
//        {
//            $cart[$id]['quantity'] = $cart[$id]['quantity'] +1;
//
//        }else{
//            $cart[$id] = [
//                'name' =>$product->product_name,
//                'price'=>$product->price,
//                'quantity'=>1
//
//            ];newProduct
//
//        }
//        session()->put('cart',$cart);
////        dd(session()->get('cart'));
//
//    }


//đánh giá sao
    public function insert_rating(Request $request){
        $data = $request->all();
        $rating = new Rating();
        $rating->product_id = $data['product_id'];
        $rating->rating = $data['index'];
        $rating->save();
        echo 'done';
    }


}
