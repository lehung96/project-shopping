<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryAddRequest;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Components\Recusive;
use DB;
use App\Imports\ExcelImports;// lấy từ app vào thư mục folder Imports đến tệp tin file ExcelImports
use App\Exports\ExcelExports;
use Excel;

session_start();
class CategoryController extends Controller
{
    private $category;
    private $htmlSlelect;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

//    public function create()
//    {
//        // cách lấy dữ liệu dùng vòng lặp foreach lop
//        //đầu tiên mình sẽ khởi tạo biến  $data
//        $data = Category::all();//Category::all(); là lấy ra tất cả các trường trong table categories
//        // sẽ lặp giá trị foreach
////        foreach ($data as $value){
////            // trong vòng lặp mình sẽ check
////            //nếu cái $value có cái parent_id == 0 sử dụng toán tử so sánh == 0 bằng với danh mục tra
////            if ($value['parent_id'] ==0){
////                // thì sẽ echo ra một cái option và sẽ nối chuỗi <option>". $value['name'] ."</option>  in ra cái tên của lựa chọn
////                echo "<option>" . $value['name']. "</option>";
////                //khi foreach gặp ngay cái danh mục cha ,thì mình tìm luôn cả danh mục con thuộc cha
////                //bằng cách là dùng vòng lặp lồng
////                foreach($data as $value2 )
////                // mình lại kiểm tra lặp lại bước ở trên
////                {
////                    //  tìm thằng con thứ nhất của vòng lặp đầu tiên
////                    //vòng lặp đầu tiên có $value này , con của parent_id cha thì phải lấy id cha
////
////                    if($value2['parent_id']==$value['id']){// ở câu lệnh này mình đã tìm được con của parent_id cha
////                        // trong này mình sẽ echo ra
////                        echo "<option>" . '-'.$value2['name']. "</option>";
////
////                        // khi tìm được con nó rồi mình tìm được cháu của nó
////                        // tiếp tục lặp
////                        foreach($data as $value3){
////                            if($value3['parent_id']== $value2['id']){
////                                echo "<option>" .'--'. $value3['name']. "</option>";
////                            }
////                        }
////
////                    }
////
////                }
////
////            }
////
////        }
//       $htmlOption =  $this->categoryRecusive(0);
//        return view('admin.category.add',compact('htmlOption'));
//    }
   public function create(){
       $htmlOption = $this->getCategory($parentId = '');
       return view('admin.category.add',compact('htmlOption'));

   }

    public function index()
    {
        $categorys = Category::paginate(10);

        return view('admin.category.index',compact('categorys'));
        // hiển thị danh mục sản phẩm
        //DB table mình truyền vào bảng csdl categories sau đó dùng hàm get() để lấy là nhiều phần tử
        // khởi tạo một biến $all_category_product DB::table('categories')->get(); sẽ lấy ra tất cả dữ liệu thuộc table là categories
//        $all_category_product = DB::table('categories')->paginate(10);
        // khai báo một biến  $manager_category_product = view 'admin.category.index ( with)  với dữ liệu all_category_product
        // đã lấy được biến ,  biến chứa dữ liệu $all_category_product chứa các dữ liệu  và sẽ gán vào all_category_product dựa vào tên này để mình lấy dữ liệu ra ở bên trang index

//        $manager_category_product  = view('admin.category.index')->with('all_category_product',$all_category_product);
//        return view('backend.layout')->with('admin.category.index',$manager_category_product);
    }

    // khi người dùng ấn submit ở form thêm danh mục thì nó sẽ đưa hết dữ liệu qua hàm này function store
    // khi đó phía server sẽ lấy dữ liệu theo các trường trong bản danh mục
    public function store(CategoryAddRequest $request){
        // khai bảo biết $data  để lưu một mảng
        $data = array();
        // mình sẽ lấy  dữ liệu theo biến cột ở phía form thêm category
        // lấy   name     = yêu cầu category_name
        // lấy category_name gửi qua data từ khóa là key name dựa vào column
        $data['name'] = $request->name;
        $data['meta_keywords'] = $request->meta_keywords;
        $data['slug'] = $request->category_slug;
        $data['desc'] = $request->category_desc;
        $data['status'] = $request->category_status;
        $data['parent_id'] = $request->parent_id;
        // sau khi mình đã lấy được dữ liệu mình thử in ra xem đã lấy được hay chưa echo ra
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        // tiếp theo mình sẽ insert vào cơ sở dữ liệu
        DB::table('categories')->insert($data);
        // sẽ đặt một cái session message( thông báo)
        Session::put('message','Thêm danh mục sản phẩm thành công');
        //viết cái message hiển thị bên phía add
        // khi thêm thành công thì trả về return về index category
        return redirect()->route('categories.index');
    }
    public function unactive($category_id){
        //insert vào db điều kiện id bằng cái $category_id đã lấy được và truyền vào điều kiện của nó
        DB::table('categories')->where('category_id',$category_id)->update(['status'=>1]);
//        dd($category_id);
        // thông báo message
        session::put('message', 'không kích hoạt danh mục thành công');
        //tra về cái categories.index
        return redirect()->route('categories.index');
    }
    public function active($category_id){
        DB::table('categories')->where('category_id',$category_id)->update(['status'=>0]);
        // thông báo message
//        dd($category_id);
        session::put('message', 'kích hoạt danh mục thành công');
        return redirect()->route('categories.index');
    }
    public function edit($id)
    {

        // hiển thị danh mục sản phẩm

        // khởi tạo một biến $all_category_product DB::table('categories')->where điều kiện là categories_id bằng cái biến $id, mình sẽ lấy đúng một danh mục sản phẩm thuôc id trỏ đến cái first() trong laravel lấy ra một danh mục sản phẩm từ dữ liệu thuộc table là categories
        $edit_category_product = DB::table('categories')->where('category_id',$id)->get();
        // khai báo một biến  $manager_category_product = view 'admin.category.index ( with)  với dữ liệu edit_category_product
        // đã lấy được biến ,  biến chứa dữ liệu $all_category_product chứa các dữ liệu  và sẽ gán vào all_category_product dựa vào tên này để mình lấy dữ liệu ra ở bên trang index
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
//        $manager_category_product  = view('categories.edit')->with('edit_category_product',$edit_category_product);
        return view('admin.category.edit',compact('edit_category_product','category','htmlOption'));

    }
    // hàm này để dùng chung với create và edit
    public function getCategory($parentId)
    {
        $data = $this->category->all();//all(); là lấy ra tất cả các trường trong table categories
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    //hàm update gửi vào một id và request lấy yều cầu dữ liệu
    public function update($id,Request $request)
    {
        //khai báo một biết data = mảng array
        $data = array();
        // mình sẽ lấy  dữ liệu theo biến cột ở phía form thêm category
        // lấy   name     = yêu cầu category_name tứ là lấy dựa vào name
        // lấy category_name gửi qua data từ khóa là key name dựa vào column
        $data['name'] = $request->name;
        $data['meta_keywords'] = $request->meta_keywords;
        $data['slug'] = $request->category_slug;
        $data['desc'] = $request->category_desc;
        $data['parent_id'] = $request->parent_id;
        // tiếp theo mình dùng phương thức update lấy bảng category where() ở id bằng cái biến $ mình truyền vào trong hàm update
        // update dựa vào $data->update($data);
        DB::table('categories')->where('category_id',$id)->update($data);
        // thêm một cái session thông báo
        Session::put('message','Cập Nhật danh mục sản phẩm thành công');
        //sau đó mình quay về redirect()
        return redirect()->route('categories.index');
    }
    // hàm xoá mềm softdelete
    public function delete($id)
    {
        $cate_del = Category::find($id);

        Category::find($id)->delete();
//        $this->category->find($id)->delete();
        return redirect()->route('categories.index',compact('cate_del'));
    }
    // hàm list khôi phục
    public function trash()
    {
        $cate_trash = Category::onlyTrashed()->paginate(6);
        return view('admin.category.trash',compact('cate_trash'));
    }
    // hàm khôi phục xóa mềm
    public function untrash($id)
    {
        $untrash = Category::withTrashed()->find($id);
        //withTrashed() này mình muốn restore() chỉ cần cái biến untrash trỏ đến restore()
        $untrash->restore();

//        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
    // hàm xóa vĩnh viễn dữ liệu đã xóa mềm softdelete
    public function fordel($id){
        $untrash = Category::withTrashed()->find($id);
        //withTrashed() này mình muốn restore() chỉ cần cái biến untrash trỏ đến restore()
        $untrash->forceDelete();

//        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }

    //Hàm xử lý chức năng xuất file
    public function export_csv(){
// hàm xuất export_csv trả về new ExcelExports có nghĩa là tạo mới ra cái file trả ExcelExports trên namespace
        // trong file ExcelExports.php của folder Excel trả về tất


       //new ExcelExports có nghĩa là tạo mới ra cái file trả ExcelExports với cái tên dữ liệu là category. đuôi mở rộng là xlsx
        return Excel::download(new ExcelExports ,'category.xlsx');
    }

    //Hàm xử lý chức năng nhập file
    public function import_csv(Request $request){
        // khởi tạo $path = yêu cầu ($request) trỏ đến file truyền vào ('file')
        //('file') này nằm ở name="file" của  <input STYLE="padding-bottom: 10px" type="file" name="file" accept=".xlsx"><br>
        //bên index.blade.php
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImports, $path);
        return back();
    }



//    public function delete($id)
//    {
//        // thì từ table categories điều kiện là id = biết $id truyền vào
//        DB::table('categories')->where('id',$id)->delete();
//        Session::put('message','Xóa danh mục sản phẩm thành công');
//        return redirect()->route('categories.index');
//    }

}
