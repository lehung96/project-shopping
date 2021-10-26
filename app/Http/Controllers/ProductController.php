<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Product;
use App\Traits\StorageImageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;// khai báo namespace để biết nó nằm trong đường dẫn như thế nào
use DB;
use Storage;
use App\Gallery;
use File;
use App\Imports\ImportProduct;// lấy từ app vào thư mục folder Imports đến tệp tin file ExcelImports
use App\Exports\ExportProduct;
use Excel;
use App\Attributes;
use App\ProductAttr;
session_start();
class ProductController extends Controller
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

        //biến $color = model Attributes với điều kiện
      // where cái name = giá trị là màu sắc muốn lấy dùng hàm get() đấy lấy ra danh sách
        $color = Attributes::where('name','màu sắc')->get();// biến $color lấy ra trường từ model qua bên add product để duyệt dữ liệu
//       dd($color);
        //tượng kích thước
        $capaci = Attributes::where('name','DUNG TÍCH NỒI')->get();
        //tương tự nhà sản xuất
        $brand= Attributes::where('name','Nhà sản xuất')->get();


        return view('admin.products.add',compact('brand','capaci','color','htmlOption'));//compact truyền sang view

    }
    // hàm này để dùng chung với create và edit
    public function getCategory($parentId)
    {
        $data = $this->category->all();//all(); là lấy ra tất cả các trường trong table categories
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function index(Request $request)
    {
//        dd('udeiemim');
        // orderby là sắp xếp theo theo product_id nghĩa là cái nào mới lên trước
        // dùng hàm ->join() để tham gia vào bảng categories
        $products = Product::join('categories','categories.category_id','=','products.category_id');
        // kiểm tra để lấy ra sản phẩm cần tìm kiếm
        if ($request->name) $products->where('product_name','like','%'.$request->name.'%');
        if ($request->names) $products->where('category_id',$request->names);

        $products =  $products->orderby('products.product_id','desc')->paginate(5);
        // search theo danh mục
        $htmlOption = $this->getCategory($parentId = '');
        $viewData = [
            'htmlOption'=>$htmlOption
        ];
//        dd($products);
//        $products = Product::paginate(10);

        return view('admin.products.index',compact('products','viewData'));
        // hiển thị danh mục sản phẩm
        //DB table mình truyền vào bảng csdl categories sau đó dùng hàm get() để lấy là nhiều phần tử
        // khởi tạo một biến $all_category_product DB::table('categories')->get(); sẽ lấy ra tất cả dữ liệu thuộc table là categories
//        $all_category_product = DB::table('categories')->paginate(10);
        // khai báo một biến  $manager_category_product = view 'admin.category.index ( with)  với dữ liệu all_category_product
        // đã lấy được biến ,  biến chứa dữ liệu $all_category_product chứa các dữ liệu  và sẽ gán vào all_category_product dựa vào tên này để mình lấy dữ liệu ra ở bên trang index

//        $manager_category_product  = view('admin.category.index')->with('all_category_product',$all_category_product);
//        return view('backend.layout')->with('admin.category.index',$manager_category_product);
    }
    public function store(ProductAddRequest $request){
//        dd($request->all());

        // khai bảo biết $data  để lưu một mảng
        $data = array();

        $price = filter_var($request->price, FILTER_SANITIZE_NUMBER_INT);
        // mình sẽ lấy  dữ liệu theo biến cột ở phía form thêm category
        // lấy   name     = yêu cầu product_name
        // lấy product_name gửi qua data từ khóa là key name dựa vào column
        $data['meta_keywords'] = $request->meta_keywords;
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_sold'] = $request->product_sold;
        $data['price'] =$price;
        $data['promontion_price'] = $request->promontion_price;
        $data['content'] = $request->contents;
        $data['desc'] = $request->desc;
        $data['category_id'] = $request->category_id;
        $data['status'] = $request->pro_status;
        $data['new'] = $request->new;
        $data['views_count'] = $request->views_count;

        $path = 'public/uploads/products/';//$path dùng để lưu hình ảnh
        $path_gallery = 'public/uploads/gallery/';


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
            $get_image->move($path,$new_image);
            File::copy($path.$new_image,$path_gallery.$new_image);
            // khai báo thêm một biến $data['image']
            // nếu chọn ảnh thì sẽ vào trường image
            $data['image']= $new_image;

//            // sau đó sẽ insert vào cơ sở dữ liệu và table
//            DB::table('products')->insert($data);
//            // sẽ đặt một cái session message( thông báo)
//            Session::put('message','Thêm sản phẩm thành công');
//            //viết cái message hiển thị bên phía add
//            // khi thêm thành công thì trả về return về index category
//            return redirect()->route('products.index');
        }
//        //Nếu người dùng ko chọn ảnh thì sẽ cho  $data['image']= null rỗng;
//        $data['image']= '';
//        // sau khi mình đã lấy được dữ liệu mình thử in ra xem đã lấy được hay chưa echo ra
////        echo '<pre>';
////        print_r($data);
////        echo '</pre>';
//        // tiếp theo mình sẽ insert vào cơ sở dữ liệu
//        DB::table('products')->insert($data);
//        // sẽ đặt một cái session message( thông báo)
//        Session::put('message','Thêm sản phẩm thành công');
//        //viết cái message hiển thị bên phía add
//        // khi thêm thành công thì trả về return về index category
//        return redirect()->route('products.index');

        // sau đó sẽ insert vào cơ sở dữ liệu và table
        $pro_id = Product::insertGetId($data);
        $gallery = new Gallery();// tạo một hình ảnh mới
        $gallery->gallery_image = $new_image;
        $gallery->gallery_name = $new_image;
        $gallery->product_id = $pro_id;
        $gallery->save();


        //  duyệt mảng id_attr gọi ở name="id_attr[]" bên form add product
        foreach ($request->id_attr as $value) {
            ProductAttr::create([
                'id_product' => $pro_id,//câu lệnh truy này lấy ra trường product_id(sản phẩm )
                // để thêm vào bảng product_attr

                'id_attr' => $value,//câu lệnh truy này lấy ra trường attributes_id (id màu sắc)
                // của sản phẩm lưu vào bảng product_attr

            ]);
        }
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

        // khai báo biền $product để duyệt dữ liệu bên form edit product
        // biến $product = model Product pương thức model là find(id) theo id truyền vào
        $product =Product::find($id);//câu lệnh truy vấn này

        /// trong hàm này getCategory($product->category_id); sẽ truyền vào $product trỏ đến category_id
        $htmlOption = $this->getCategory($product->category_id);
//        $manager_category_product  = view('categories.edit')->with('edit_category_product',$edit_category_product);

        //biến $color = model Attributes với điều kiện
        // where cái name = giá trị là màu sắc muốn lấy dùng hàm get() đấy lấy ra danh sách
        $color = Attributes::where('name','màu sắc')->get();// biến $color lấy ra trường từ model qua bên add product để duyệt dữ liệu
//       dd($color);
        //tương tự  kích thước
        $capaci = Attributes::where('name','DUNG TÍCH NỒI')->get();
        //tương tự nhà sản xuất
        $brand= Attributes::where('name','Nhà sản xuất')->get();

        // sau compact các
        //Biến  $color, $size, $brand sang bên form edit product

        //Khởi tạo biến $id_attr
     //biến $id_attr = DB::table('product_attrs')nghĩa là bằng bảng product_attrs
        // điều kiện where('id_product',$id) lấy cái id_product trong bảng productattr_id và
        // so sánh với $id truyền vào .
                                                //Và cái cách sử dụng cái pluck('id_attr')->toArry();
                                                //Trong khi đấy chỉ cần trỏ đến cái 'id_attr' này
        $id_attr =DB::table('product_attrs')->where('id_product',$id)->pluck('id_attr')->toArray();// câu lệnh truy vấn này trả về một mảng
//        dd($id_attr);

        // sau đó sẽ foreach để duyệt biến $color này ra
        //Tại sao phải duyệt $color này ra? bởi vì bên form edit product cũng phải duyệt ra
//        foreach ($color as $key=>  $value){
//            echo "<pre>";
//            //dùng hàm in_array($value->productattr_id,$id_attr) để gửi sang bên view  form sửa product
//            var_dump(in_array($value->productattr_id,$id_attr));
//
//        }
        //Tiếp theo gửi mảng  $id_attr sang view form sửa product

        return view('admin.products.edit',compact('id_attr','brand','capaci','color','product','htmlOption'));

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
        $price = filter_var($request->price, FILTER_SANITIZE_NUMBER_INT);
        // mình sẽ lấy  dữ liệu theo biến cột ở phía form thêm category
        // lấy   name     = yêu cầu product_name
        // lấy product_name gửi qua data từ khóa là key name dựa vào column
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['price'] = $price;
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
           Product::where('product_id',$id)->update($data);
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
       $pro= DB::table('products')->where('product_id',$id)->update($data);
        //  duyệt mảng id_attr gọi ở name="id_attr[]" bên form add product
        foreach ($request->id_attr as $value) {
            ProductAttr::create([
                'id_product' => $pro,//câu lệnh truy này lấy ra trường product_id(sản phẩm )
                // để thêm vào bảng product_attr

                'id_attr' => $value,//câu lệnh truy này lấy ra trường attributes_id (id màu sắc)
                // của sản phẩm lưu vào bảng product_attr

            ]);
        }
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

    //Hàm xử lý chức năng xuất file
    public function export_csv(){
// hàm xuất export_csv trả về new ExcelExports có nghĩa là tạo mới ra cái file trả ExcelExports trên namespace
        // trong file ExcelExports.php của folder Excel trả về tất


        //new ExcelExports có nghĩa là tạo mới ra cái file trả ExcelExports với cái tên dữ liệu là category. đuôi mở rộng là xlsx
        return Excel::download(new ExportProduct ,'product.xlsx');
    }

    //Hàm xử lý chức năng nhập file
    public function import_csv(Request $request){
        // khởi tạo $path = yêu cầu ($request) trỏ đến file truyền vào ('file')
        //('file') này nằm ở name="file" của  <input STYLE="padding-bottom: 10px" type="file" name="file" accept=".xlsx"><br>
        //bên index.blade.php
        $path = $request->file('file')->getRealPath();
        Excel::import(new ImportProduct, $path);
        return back();
    }




//    function home_index(){
//        $leagues = DB::table('products')
//            ->select('id')
//            ->join('categories', 'categories.category_id', '=', 'products.category_id')
//            ->where('categories.category_id', 13)
//            ->get();
//    }

//phần xử lý bình luận
    public function file_browser(Request $request){
        $paths = glob(public_path('uploads/ckeditor/*'));

        $fileNames = array();

        foreach($paths as $path){
            array_push($fileNames,basename($path));
        }
        $data = array(
            'fileNames' => $fileNames
        );

        return view('admin.images.file_browser')->with($data);
    }
    public function reply_comment(Request $request){
        $data = $request->all();
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->comment_product_id = $data['comment_product_id'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->comment_status = 0;
        $comment->comment_name = 'HiếuStore';
        $comment->save();

    }
    public function allow_comment(Request $request){
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }
    public function list_comment(){
        $comment = DB::table('tbl_comment')->join('products', 'tbl_comment.comment_product_id', '=', 'products.product_id')->where('comment_parent_comment','=',0)->orderBy('comment_id','DESC')->get();
//        $comment = Comment::with('product')->where('comment_parent_comment','=',0)->orderBy('comment_id','DESC')->get();
//        dd($comment);
        $comment_rep = Comment::with('product')->where('comment_parent_comment','>',0)->get();
        return view('admin.comment.list_comment')->with(compact('comment','comment_rep'));
    }
    public function send_comment(Request $request){
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_product_id = $product_id;
        $comment->comment_status = 1;
        $comment->comment_parent_comment = 0;
        $comment->save();

    }
    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id',$product_id)->where('comment_parent_comment','=',0)->where('comment_status',0)->get();
        $comment_rep = Comment::with('product')->where('comment_parent_comment','>',0)->get();
        $output = '';
        foreach($comment as $key => $comm){
//        dd($comm);
            $output.= '
            <div class="row style_comment">

                                        <div class="col-md-2">
                                            <img width="100%" src="'.url('/public/frontend/images/2.png').'" class="img img-responsive img-thumbnail">
                                        </div>
                                        <div class="col-md-10">
                                            <p style="color:green;">@'.$comm->comment_name.'</p>
                                            <p style="color:#000;">'.$comm->comment_date.'</p>
                                            <p>'.$comm->comment.'</p>
                                        </div>
                                    </div><p></p>
                                    ';

            foreach($comment_rep as $key => $rep_comment)  {

                if($rep_comment->comment_parent_comment==$comm->comment_id)  {
//                                            dd($rep_comment);
                    $output.= ' <div class="row style_comment" style="margin:5px 40px;background: aquamarine;">

                                        <div class="col-md-2">
                                            <img width="80%" src="'.url('/public/frontend/images/1.png').'" class="img img-responsive img-thumbnail">
                                        </div>
                                        <div class="col-md-10">
                                            <p style="color:blue;">@Admin</p>
                                            <p style="color:#000;">'.$rep_comment->comment.'</p>

                                            <p></p>
                                        </div>
                                    </div><p></p>';
                }
            }
        }
        echo $output;


    }
    public function local_storage(){
        return view('pages.local_storage.storage');
    }

    //hàm xử lý xem nhanh sản phẩm
    public function quickview(Request $request){

        $product_id = $request->product_id;
        $product = Product::find($product_id);

        $gallery = Gallery::where('product_id',$product_id)->get();

        $output['product_gallery'] = '';

        foreach($gallery as $key => $gal){
            $output['product_gallery'].= '<p><img width="100%" src="public/uploads/gallery/'.$gal->gallery_image.'"></p>';
        }

        $output['product_name'] = $product->product_name;
        $output['product_id'] = $product->product_id;
        $output['desc'] = $product->desc;
        $output['content'] = $product->content;
        $output['price'] = number_format($product->price,0,',','.').'VNĐ';
        $output['image'] = '<p><img width="100%" src="public/uploads/products/'.$product->image.'"></p>';

        $output['product_button'] = '<input type="button" value="Mua ngay" class="btn btn-primary btn-sm add-to-cart-quickview" id="buy_quickview" data-id_product="'.$product->product_id.'"  name="add-to-cart">';

        $output['product_quickview_value'] = '

        <input type="hidden" value="'.$product->product_id.'" class="cart_product_id_'.$product->product_id.'">

        <input type="hidden" value="1" class="cart_product_qty_'.$product->product_id.'">';

        echo json_encode($output);


    }



}
