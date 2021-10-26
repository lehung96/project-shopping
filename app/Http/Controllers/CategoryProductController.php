<?php

namespace App\Http\Controllers;

use App\Attributes;
use App\Cart;
use App\Category;
use App\CatePost;
use App\City;
use App\Components\Recusive;
use App\Menu;
use App\Product;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    //lấy ra sản phẩm thuôc danh mục con cấp 2
    public function index( Request $request,$slug, $categoryId)
    {

        $city = City::orderby('matp','ASC')->get();
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
        $htmlOption = $this->getCategory($parentId = '');
//        dd('list category');
        $categorysLimit = Category::where('parent_id', 0)->take(12)->get();
        // lấy ra sản phẩm thuộc danh mục sản phẩm
        //
        $category_name = Category::where('categories.slug',$slug)->limit(1)->get();
        foreach($category_name as $key => $val) {
            //seo
            $meta_desc = $val->desc;
            $meta_keywords = $val->meta_keywords;
            $meta_title = $val->name;
            $url_canonical = $request->url();
            //--seo
        }
//        $attribute_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('attribute_id','DESC')->paginate(6);
        $products = Product::where('category_id', $categoryId)->paginate(6);
        $category_products = Product::where('category_id', $categoryId)->get();

        return view('pages.product.category.list',compact('category_products','category_name','meta_desc','meta_keywords','meta_title','url_canonical','city','cart','categorysLimit','products','htmlOption','menusLimit'));
    }

/// lọc theo giá
    public function indexFilterprice(Request $request, $slug,  $categoryId, $id,$order)
    {
        $city = City::orderby('matp','ASC')->get();
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
        $htmlOption = $this->getCategory($parentId = '');
//        dd('list category');
        $categorysLimit = Category::where('parent_id', 0)->take(12)->get();
        // lấy ra sản phẩm thuộc danh mục sản phẩm
        //
        $category_name = Category::where('categories.slug',$slug)->limit(1)->get();
        foreach($category_name as $key => $val) {
            //seo
            $meta_desc = $val->desc;
            $meta_keywords = $val->meta_keywords;
            $meta_title = $val->name;
            $url_canonical = $request->url();
            //--seo
        }


//        $attribute_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('attribute_id','DESC')->paginate(6);
        $products = Product::where('category_id', $categoryId)->orderBy('product_id','DESC')->paginate(6);
        $category_products = Product::where('category_id', $categoryId)->get();
        switch ($order) {
            case '200k-500k':
                $products->whereBetween('price',[200000,500000]);
                break;
//            case '1t-10t':
//                $products->whereBetween('price',[1000000,10000000]);
//                break;
//            case '10t-20t':
//                $products->whereBetween('pro_price',[10000000,20000000]);
//                break;
//            case '20t-50t':
//                $products->whereBetween('pro_price',[20000000,50000000]);
//                break;
//            case 't50t':
//                $products->where('pro_price','>',50000000);
//                break;
//            case 'az':
//                $products->orderBy('pro_name','ASC');
//                break;
//            case 'za':
//                $products->orderBy('pro_name','DESC');
//                break;
//            case 'mn':
//                $products->orderBy('created_at','DESC');
//                break;
//            case 'cn':
//                $products->orderBy('created_at','ASC');
//                break;
//            case 'td':
//                $products->orderBy('pro_price','ASC');
//                break;
//            case 'gd':
//                $products->orderBy('pro_price','DESC');
//                break;
//            default:
//                dd("Lỗi");
//                break;
        }

        return view('pages.product.category.list',compact('category_products','category_name','meta_desc','meta_keywords','meta_title','url_canonical','city','cart','categorysLimit','products','htmlOption','menusLimit'));
    }



    //lấy ra sản phẩm thuôc danh mục con cấp 1
//    public function getCategoryProduct(Request $request,$slug, $categoryId,$cate_id){
//        $city = City::orderby('matp','ASC')->get();
//        $oldCart = Session::has('cart') ? Session::get('cart') :null;
//        $cart = new Cart($oldCart);
//        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
//        $htmlOption = $this->getCategory($parentId = '');
////        dd('list category');
//        $categorysLimit = Category::where('parent_id', 0)->take(12)->get();
//        // lấy ra sản phẩm thuộc danh mục sản phẩm
//        //
//        $category_name = Category::where('categories.slug',$slug)->limit(1)->get();
//        foreach($category_name as $key => $val) {
//            //seo
//            $meta_desc = $val->desc;
//            $meta_keywords = $val->meta_keywords;
//            $meta_title = $val->name;
//            $url_canonical = $request->url();
//            //--seo
//        }
//        $products = Product::where('category_id', $categoryId)->paginate(6);
//        $category_products = Product::where('category_id', $cate_id)->get();
//        return view('pages.product.category.listcategoryproduct',compact('category_products','category_name','meta_desc','meta_keywords','meta_title','url_canonical','city','cart','categorysLimit','products','htmlOption','menusLimit'));
//    }

    public function getcategoryallproduct(Request $request,$slug, $categoryId){
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
        $htmlOption = $this->getCategory($parentId = '');
//        dd('list category');
        $categorysLimit = Category::where('parent_id', 0)->take(12)->get();
        // lấy ra sản phẩm thuộc danh mục sản phẩm
        //
        $category_name = Category::where('categories.slug',$slug)->limit(1)->get();
        foreach($category_name as $key => $val) {
            //seo
            $meta_desc = $val->desc;
            $meta_keywords = $val->meta_keywords;
            $meta_title = $val->name;
            $url_canonical = $request->url();
            //--seo
        }

        $category =  Category::find($categoryId);

        $categories = [];
        if ($category->categoryChildrent->count() > 0) {
            foreach ($category->categoryChildrent as $categoryChildrent) {
                if ($categoryChildrent->categoryChildrent->count() > 0) {
                    foreach ($categoryChildrent->categoryChildrent as $categoryChildrentlv2) {
                        $categories[] = $categoryChildrentlv2->category_id;
                    }
                } else {
                    $categories[] = $categoryChildrent->category_id;
                }
            }
        } else {
            $categories[] = $category->category_id;
        }
        //lấy ra sản phẩm thuôc danh mục con cấp 2
        $products = Product::whereIn('category_id', $categories)->get();

        $min_price = Product::min('price');
        $max_price = Product::max('price');

        $min_price_range = $min_price + 500000;
        $max_price_range = $max_price + 10000000;

//        $category_by_slug = Category::where('slug',$slug)->get();
        foreach($products as $key => $cate){
            $category_id = $cate->category_id;
        }

        if(isset($_GET['sort_by'])){

            $sort_by = $_GET['sort_by'];

            if($sort_by=='giam_dan'){

                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('price','DESC')->paginate(6)->appends(request()->query());
//                dd($category_by_id);

            }elseif($sort_by=='tang_dan'){

                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('price','ASC')->paginate(6)->appends(request()->query());

            }elseif($sort_by=='kytu_za'){

                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_name','DESC')->paginate(6)->appends(request()->query());


            }elseif($sort_by=='kytu_az'){

                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_name','ASC')->paginate(6)->appends(request()->query());
            }

        }elseif(isset($_GET['start_price']) && $_GET['end_price']){

            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];

            $category_by_id = Product::with('category')->whereBetween('product_price',[$min_price,$max_price])->orderBy('product_price','ASC')->paginate(6);

        }
        else{
            $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_id','DESC')->paginate(6);
        }


//Lọc giá

        if(isset($_GET['price'])){

            $price = $_GET['price'];

            if($price=='1'){

                $category_by_id = Product::with('category')->where('category_id',$category_id)->whereBetween('price',[200000,500000])->paginate(6)->appends(request()->query());
//                dd($category_by_id);

            }
            elseif($price=='2'){

                $category_by_id = Product::with('category')->where('category_id',$category_id)->whereBetween('price',[500000,1000000])->paginate(6)->appends(request()->query());

            }elseif($price=='3'){

                $category_by_id = Product::with('category')->where('category_id',$category_id)->whereBetween('price',[1500000,2000000])->paginate(6)->appends(request()->query());


            }elseif($price=='4'){

                $category_by_id = Product::with('category')->where('category_id',$category_id)->whereBetween('price',[2000000,3000000])->paginate(6)->appends(request()->query());
            }
            elseif($price=='5'){

                $category_by_id = Product::with('category')->where('category_id',$category_id)->whereBetween('price',[3000000,5000000])->paginate(6)->appends(request()->query());
            }

        }
//        elseif(isset($_GET['start_price']) && $_GET['end_price']){
//
//            $min_price = $_GET['start_price'];
//            $max_price = $_GET['end_price'];
//
//            $category_by_id = Product::with('category')->whereBetween('product_price',[$min_price,$max_price])->orderBy('product_price','ASC')->paginate(6);
//
//        }
        else{
            $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_id','DESC')->paginate(6);
        }





//        //lấy ra sản phẩm thuôc danh mục con cấp 1
//        $category_products = Product::where('category_id', $cate_id)->get();
//
//        //lấy ra ra tất cả sản phẩm thuộc danh mục cha
////        $category_allproduct = Product::where('category_id', $cate_id)->get();
//        $category_allproduct = Product::join('categories', 'categories.category_id', '=', 'products.category_id')->where('categories.category_id',$cate_id)->get();
//        dd("@#!@#");

        //biến $color = model Attributes với điều kiện
        // where cái name = giá trị là màu sắc muốn lấy dùng hàm get() đấy lấy ra danh sách
        $color = Attributes::where('name','màu sắc')->get();// biến $color lấy ra trường từ model qua bên add product để duyệt dữ liệu
//       dd($color);
        //tượng kích thước
        $capaci = Attributes::where('name','DUNG TÍCH NỒI')->get();
        //tương tự nhà sản xuất
        $brand= Attributes::where('name','Nhà sản xuất')->get();

        //biến $category_post đổ dử liệu danh mục ra tin tức
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

        return view('pages.product.category.list',compact('max_price_range','min_price_range','min_price','max_price','category_post','category_by_id','brand','capaci','color','category_name','meta_desc','meta_keywords','meta_title','url_canonical','cart','categorysLimit','htmlOption','menusLimit'));
    }





    // hàm này để dùng chung với create và edit
    public function getCategory($parentId)
    {
        $data = $this->category->all();//all(); là lấy ra tất cả các trường trong table categories
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
}
