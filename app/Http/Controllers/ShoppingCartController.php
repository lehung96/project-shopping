<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\CatePost;
use App\Components\Recusive;
use App\Menu;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Session;

// khai báo namespace để biết nó nằm trong đường dẫn như thế nào
use DB;
use Storage;

session_start();

class ShoppingCartController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function ShoppingCart(Request $request)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
        $htmlOption = $this->getCategory($parentId = '');

        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng Ajax";
        $meta_title = "Giỏ hàng của bạn";
        $url_canonical = $request->url();
        //biến $category_post đổ dử liệu danh mục ra tin tức
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        return view('pages.product.shopping_cart.list', compact('category_post','meta_desc','meta_keywords','meta_title','url_canonical','htmlOption', 'menusLimit','cart'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();//all(); là lấy ra tất cả các trường trong table categories
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    // Hàm thêm giỏ hàng ở phần chi tiết
    public function AddCartDetails( Request $request ,$product_id)
    {
//        dd($product_id);
        // lấy sản phẩm tương ứng với id truyền vào
        $product = Product::find($product_id);
//        dd($product);
        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
        $htmlOption = $this->getCategory($parentId = '');
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldCart);// tạo một đối tượng giỏ hàng mới từ lớp cart này gọi __construct
        // truyền vào giỏ hàng cũ là $oldCart

//        $collection = collect(['product_id', 'price', 'quantity', 'image', 'product_name', 'promontion_price']);
//        $combined = $collection->combine([$product_id, $product->price, $request->quantity, $product->image, $product->product_name, $product->promontion_price]);
//        $arr_product = $combined->all();
//        $object = (object)$arr_product;

        $cart->add($product, $product_id, $request->quantity);

        //---------------------------//
        //có nghĩa là từ cái  $request->session() này , sẽ đẩy cái session lên tên là cart và cái giá trị là  $cart
        $request->session()->put('cart',$cart);
//        dd($request->session()->get('cart'));
        //--seo
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng Ajax";
        $meta_title = "Giỏ hàng Ajax";
        $url_canonical = $request->url();

        //--seo
        return view('pages.product.shopping_cart.list_cart',compact('meta_desc','meta_keywords','meta_title','url_canonical','htmlOption','menusLimit'));

    }
    // Thêm giỏ hàng
    public function getAddToCart( Request $request ,$product_id)
    {
        // khởi tạo 1 biến
        // ->first(); là lấy ra một kết qảu đầu tiên thì sẽ ra một kết quả
//        $product = Product::where('product_id',$id)->first();
        $product = Product::find($product_id);
//        dd($product);
        //Vì chúng ta request qua = phương thức GET
        // Nên giả sử trong cái list product ko có id = 90 thì khi đó sẽ trả về giá trị null
        //-------------------------//
        // vậy có bước kiểm tra điều kiện bắt trường hợp = null
        // nếu kết quả trả về là null thì mình ko sử lý
        // mình bắt trường hợp khác null mình mới sử lý
        // mình xử lý khi nó tồn tại một sản phẩm nào đó
//        if ($product != null){
//            // tạo biến $cart
//            //Cái session giống dạng key value
//            //Cái key này do mình quyết định
//            // giờ mình đặt session là Session('Cart');
//
//            // chúng ta sẽ kiểm tra nếu Session('Cart'); khác null
//            if (Session('Cart') != null){
//                // tức đối tương  $oldcart sẽ = đối tượng Session('Cart');
//                // chúng ta sẽ viết ra biểu thức 3 ngôi
//                //  biến $oldcart  có nghĩa là giỏ hàng hiện tại
//                $oldCart = Session('Cart') ? Session('Cart'):null ;
//                // biến  $newCart  nghĩa là giỏ hàng sau khi chúng ta thêm mới thì nó sẽ là giỏ hàng mới
//                // sẽ bằng  new Cart(); và truyền $oldCart vào
//                //--------------
//                // nghĩa là chúng ta tạo một đối tương giỏ hàng mới $newCart từ lớp đối tượng
//                //lớp Cart trong model ở hàm     public function __constant($cart){ ở giỏ hàng cũ $cart
//                $newCart = new  Cart($oldCart);
//                // từ đối tượng $newCart giỏ hàng mới chúng ta gọi đến phương thức là AddCart() ở bên lớp Cart     public  function  AddCart($product,$id){
//                $newCart-> AddCart($product,$id);
//                dd($newCart);
//            }
//
//        }
        $quantity=1;
        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
        $htmlOption = $this->getCategory($parentId = '');
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product_id,$quantity);
        //---------------------------//
        //có nghĩa là từ cái  $request->session() này , sẽ đẩy cái session lên tên là cart và cái giá trị là  $cart
        $request->session()->put('cart',$cart);
//        dd($request->session()->get('cart'));
        return view('pages.product.shopping_cart.cart',compact('htmlOption','menusLimit'));


    }

/// tọa hàm DeleteIteamCart gọi bên lớp class Cart.php chức năng xóa giỏ hàng

    public function DeleteIteamCart( Request $request ,$product_id)
    {

        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
        $htmlOption = $this->getCategory($parentId = '');
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart->DeleteIteamCart( $product_id);
        //---------------------------//
        //sau khi đã song nó sẽ kiểm tra lại
        // nếu cái $cart trỏ đến cái danh sách items mà nó có tồn tại số lượng >0
        // có tồn tại số lượng dùng hàm count (count($cart->items))
        if (count($cart->items)>0) {
                // thì trong này chúng ta mới đẩy lại giỏ hàng
            $request->session()->put('cart',$cart);
        }
        //còn ngược lại
        else {
            // sẽ xóa hẳn giỏ hàng luôn
            //forget nếu session đang tồn tại thì nó xóa bỏ luôn
            $request->session()->forget('cart');
        }
//        dd($request->session()->get('cart'));
        return view('pages.product.shopping_cart.cart',compact('htmlOption','menusLimit'));
    }


    // tọa hàm chức năng xóa danh sách giỏ hàng
    public function DeleteListIteamCart(Request $request ,$product_id){
        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
        $htmlOption = $this->getCategory($parentId = '');
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart->DeleteIteamCart( $product_id);
        //---------------------------//
        //sau khi đã song nó sẽ kiểm tra lại
        // nếu cái $cart trỏ đến cái danh sách items mà nó có tồn tại số lượng >0
        // có tồn tại số lượng dùng hàm count (count($cart->items))
        if (count($cart->items)>0) {
            // thì trong này chúng ta mới đẩy lại giỏ hàng
            $request->session()->put('cart',$cart);
        }
        //còn ngược lại
        else {
            // sẽ xóa hẳn giỏ hàng luôn
            //forget nếu session đang tồn tại thì nó xóa bỏ luôn
            $request->session()->forget('cart');
        }
//        dd($request->session()->get('cart'));
        return view('pages.product.shopping_cart.list_cart',compact('htmlOption','menusLimit'));

    }


    // tọa hàm chức năng cập nhật số lượng  danh sách giỏ hàng và truyền thêm biến số lượng vào  là 3 đối số

    public function SaveListCart(Request $request ,$product_id, $quanty){
        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
        $htmlOption = $this->getCategory($parentId = '');

        // đầu tiên lấy một giỏ hàng cũ
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        //tạo một cái new cart
        $cart = new Cart($oldCart);
        // sau rồi mình thực hiện cập nhật hàm UpdateIteamCart sẽ nhận vào 2 đối số là $product_id và $quanty
        $cart->UpdateIteamCart( $product_id,$quanty);

        //---------------------------//
        //sau khi đã song nó sẽ kiểm tra lại
        // nếu cái $cart trỏ đến cái danh sách items mà nó có tồn tại số lượng >0
        // có tồn tại số lượng dùng hàm count (count($cart->items))

//        dd($request->session()->get('cart'));
        //có nghĩa là từ cái  $request->session() này , sẽ đẩy cái session lên tên là cart và cái giá trị là  $cart
        $request->session()->put('cart',$cart);
        return view('pages.product.shopping_cart.list_cart',compact('htmlOption','menusLimit'));

    }

    // lưu toàn bộ số lượng sản phẩm cập nhật
    public function SaveAllListCart(Request $request ){
        $menusLimit = Menu::where('parent_id', 0)->take(7)->get();
        $htmlOption = $this->getCategory($parentId = '');
        // đầu tiên lấy một giỏ hàng cũ
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        // in ra
//        dd($request->data);
        // tạo 1 biết $data
        $data = $request->data;
        // khi trả về một danh sách giờ sẽ duyệt array đó
        //trong vòng lặp truyền vào biến $request->data
        // và coi như một lần lặp là một items
        foreach($request->data as $item ){
            // đầu tiên lấy một giỏ hàng cũ
            $oldCart = Session::has('cart') ? Session::get('cart') :null;
            //tạo một cái new cart
            $cart = new Cart($oldCart);
            // sau rồi mình thực hiện cập nhật hàm UpdateIteamCart sẽ nhận vào 2 đối số là $product_id và $quanty
            $cart->UpdateIteamCart($item['key'],$item['value']);
            $request->session()->put('cart',$cart);

        }
        //---------------------------//
        //sau khi đã song nó sẽ kiểm tra lại
        // nếu cái $cart trỏ đến cái danh sách items mà nó có tồn tại số lượng >0
        // có tồn tại số lượng dùng hàm count (count($cart->items))

//        dd($request->session()->get('cart'));
        //có nghĩa là từ cái  $request->session() này , sẽ đẩy cái session lên tên là cart và cái giá trị là  $cart

        return view('pages.product.shopping_cart.list_cart',compact('htmlOption','menusLimit'));

    }

    //Hàm Lưu sản phẩm vào giỏ hàng ở chi tiết sản phẩm
//    public function save_cart(Request $request){
//
//    }


}
