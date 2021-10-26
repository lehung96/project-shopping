<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Product;
use App\Sells_slide;
use App\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Session;// khai báo namespace để biết nó nằm trong đường dẫn như thế nào
use DB;
use Storage;
session_start();

class SellSlideController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;

    // khởi tạo hàm construct để gán biến $category
    // public function __construct(Category $category) gọi là eloquent model laravel quy định
    public function __construct(Category $category ,Product $product)// biến $category là Instant (tức thì ) của class Category
    {
        // sau đó mình gán biến private $category; = Instant của biến $category được truyền vào trong __construct
        $this->category = $category;
        $this->product = $product;


    }

    public function create(){
        //htmlOption gọi đến phương thức getCategory
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.products.add',compact('htmlOption'));//compact truyền sang view

    }
    // hàm này để dùng chung với create và edit
    public function getCategory($parentId)
    {
        $data = $this->category->all();//all(); là lấy ra tất cả các trường trong table categories
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function index() {
        $s_sliders = Sells_slide::paginate(10);

        return view('admin.sellslider.index',compact('s_sliders'));
    }
    public function store(ProductAddRequest $request){
        // khai bảo biết $data  để lưu một mảng
        $data = array();
        // mình sẽ lấy  dữ liệu theo biến cột ở phía form thêm category
        // lấy   name     = yêu cầu product_name
        // lấy product_name gửi qua data từ khóa là key name dựa vào column
        $data['product_name'] = $request->product_name;
        $data['price'] = $request->price;
        $data['promontion_price'] = $request->promontion_price;
        $data['content'] = $request->contents;
        $data['desc'] = $request->desc;
        $data['category_id'] = $request->category_id;
        $data['status'] = $request->pro_status;
        $data['new'] = $request->new;
        $data['views_count'] = $request->views_count;

        // them hinh anh
        $get_image = $request->file('image');
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
            $get_image->move('public/uploads/products/',$new_image);
            // khai báo thêm một biến $data['image']
            // nếu chọn ảnh thì sẽ vào trường image
            $data['image']= $new_image;

            // sau đó sẽ insert vào cơ sở dữ liệu và table
            DB::table('products')->insert($data);
            // sẽ đặt một cái session message( thông báo)
            Session::put('message','Thêm sản phẩm thành công');
            //viết cái message hiển thị bên phía add
            // khi thêm thành công thì trả về return về index category
            return redirect()->route('products.index');
        }
        //Nếu người dùng ko chọn ảnh thì sẽ cho  $data['image']= null rỗng;
        $data['image']= '';
        // sau khi mình đã lấy được dữ liệu mình thử in ra xem đã lấy được hay chưa echo ra
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        // tiếp theo mình sẽ insert vào cơ sở dữ liệu
        DB::table('products')->insert($data);
        // sẽ đặt một cái session message( thông báo)
        Session::put('message','Thêm sản phẩm thành công');
        //viết cái message hiển thị bên phía add
        // khi thêm thành công thì trả về return về index category
        return redirect()->route('products.index');
    }
    public function edit($id)
    {
        // hiển thị danh mục sản phẩm

        // khởi tạo một biến $edit_product DB::table('products')->where điều kiện là product_id bằng cái biến $id, mình sẽ lấy đúng một sản phẩm thuôc id trỏ đến cái first() trong laravel lấy ra một  sản phẩm từ dữ liệu thuộc table là products
//        $edit_product = DB::table('products')->where('product_id',$id)->get();
        // khai báo một biến  $manager_category_product = view 'admin.category.index ( with)  với dữ liệu edit_category_product
        // đã lấy được biến ,  biến chứa dữ liệu $all_category_product chứa các dữ liệu  và sẽ gán vào all_category_product dựa vào tên này để mình lấy dữ liệu ra ở bên trang index
        $product = $this->product->find($id);


        /// trong hàm này getCategory($product->category_id); sẽ truyền vào $product trỏ đến category_id
        $htmlOption = $this->getCategory($product->category_id);
//        $manager_category_product  = view('categories.edit')->with('edit_category_product',$edit_category_product);
        return view('admin.products.edit',compact('product','htmlOption'));

    }
    public function unactive($pro_id){
        //insert vào db điều kiện id bằng cái $category_id đã lấy được và truyền vào điều kiện của nó
        Product::where('product_id',$pro_id)->update(['status'=>1]);
//        dd($pro_id);
        // thông báo message
        session::put('message', 'không kích hoạt sản phẩm thành công');
        //tra về cái categories.index
        return redirect()->route('products.index');
    }

    public function active($pro_id){
        Product::where('product_id',$pro_id)->update(['status'=>0]);
        // thông báo message
//        dd($pro_id);
        session::put('message', 'kích hoạt sản phẩm thành công');
        return redirect()->route('products.index');
    }


    public function update(Request $request, $id)
    {
        // khai bảo biết $data  để lưu một mảng
        $data = array();
        // mình sẽ lấy  dữ liệu theo biến cột ở phía form thêm category
        // lấy   name     = yêu cầu product_name
        // lấy product_name gửi qua data từ khóa là key name dựa vào column
        $data['product_name'] = $request->product_name;
        $data['price'] = $request->price;
        $data['promontion_price'] = $request->promontion_price;
        $data['content'] = $request->contents;
        $data['desc'] = $request->desc;
        $data['category_id'] = $request->category_id;
        $data['new'] = $request->new;
        $data['views_count'] = $request->views_count;
//        $data['status'] = $request->pro_status;
        // update hinh anh

        $get_image = $request->file('image');
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
            $get_image->move('public/uploads/products/',$new_image);
            // khai báo thêm một biến $data['image']
            // nếu chọn ảnh thì sẽ vào trường image
            $data['image']= $new_image;

            // sau đó sẽ update vào cơ sở dữ liệu và table vời điều kiện where product_id
            // và bằng cái $id truyền vào trong hàm update
            DB::table('products')->where('product_id',$id)->update($data);
            // update($data); truyền vào $data update dựa vào số cột và name đã lấy
            // sẽ đặt một cái session message( thông báo)
            Session::put('message','cập nhật sản phẩm thành công');
            //viết cái message hiển thị bên phía add
            // khi thêm thành công thì trả về return về index category
            return redirect()->route('products.index');
        }
        //Nếu người dùng ko chọn ảnh thì sẽ  để nguyên  image

        // sau khi mình đã lấy được dữ liệu mình thử in ra xem đã lấy được hay chưa echo ra
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        // tiếp theo mình sẽ update vào cơ sở dữ liệu
        DB::table('products')->where('product_id',$id)->update($data);
        // sẽ đặt một cái session message( thông báo)
        Session::put('message','cập nhật sản phẩm thành công');
        //viết cái message hiển thị bên phía add
        // khi thêm thành công thì trả về return về index category
        return redirect()->route('products.index');


    }
    // hàm xoá mềm softdelete
    public function delete($id)
    {
        $pro_del = Product::find($id);
//        dd($pro_del);
        Product::find($id)->delete();

//        $this->category->find($id)->delete();
        return redirect()->route('products.index',compact('pro_del'));
    }
    // hàm list khôi phục
    public function trash()
    {
//        $pro_trash = Product::onlyTrashed()->paginate(6);
        $pro_trash =  Product::onlyTrashed() ->join('categories','categories.category_id','=','products.category_id')->orderby('products.product_id','desc')->paginate(10);
        return view('admin.products.trash',compact('pro_trash'));
    }
    // hàm khôi phục xóa mềm
    public function untrash($id)
    {
        $untrash = Product::withTrashed()->find($id);
        //withTrashed() này mình muốn restore() chỉ cần cái biến untrash trỏ đến restore()
        $untrash->restore();

//        $this->category->find($id)->delete();
        return redirect()->route('products.index');
    }
    // hàm xóa vĩnh viễn dữ liệu đã xóa mềm softdelete
    public function fordel($id){
        $untrash = Product::withTrashed()->find($id);
        //withTrashed() này mình muốn restore() chỉ cần cái biến untrash trỏ đến restore()
        $untrash->forceDelete();

//        $this->category->find($id)->delete();
        return redirect()->route('products.index');
    }


//    function home_index(){
//        $leagues = DB::table('products')
//            ->select('id')
//            ->join('categories', 'categories.category_id', '=', 'products.category_id')
//            ->where('categories.category_id', 13)
//            ->get();
//    }


}
