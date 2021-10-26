<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryAddRequest;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Components\Recusive;
use DB;
use App\Attributes;
use App\Imports\ExcelImports;// lấy từ app vào thư mục folder Imports đến tệp tin file ExcelImports
use App\Exports\ExcelExports;
use Excel;

session_start();

class AttributesController extends Controller
{

    public function index(){
        $attributes = Attributes::paginate(5);
        return view('admin.attributes.index',compact('attributes'));
    }

    public function create(){

        return view('admin.attributes.add');

    }

    //hàm store tạo mới thuộc tính (attributes)
    public function store(Request $request){// lầy dữ liệu nhập vào từ form add
//        dd($request->all());//in ra giá trị mã mầu
        //tạo mới thuộc tính (attributes) ở đây
        // sử model Attributes để tường tác với controller
//        Attributes::create($request->all());//câu lệnh truy vấn này tạo mới attributes
        //thêm mới vào trong bảng product
        Attributes::create($request->all());

        return redirect()->route('attributes.index');

    }

    //hàm sửa thuộc tính
    public function edit($id)
    {
        $edit_attributes = Attributes::where('attribute_id',$id)->get();
//        dd($edit_attributes);
        return view('admin.attributes.edit',compact('edit_attributes'));

    }
    //cập nhật thuộc tính
    public function update($id,Request $request)
    {
        $data = array();
        $data['value'] = $request->value;
       Attributes::where('attribute_id',$id)->update($data);
        // thêm một cái session thông báo
        Session::put('message','Cập Nhật danh mục Thuộc tính sản phẩm thành công');
        //sau đó mình quay về redirect()
        return redirect()->route('attributes.index');
    }
    public function delete($id)
    {
//        $cate_del = Attributes::find($id);

        Attributes::find($id)->delete();
//        $this->category->find($id)->delete();
        return redirect()->route('attributes.index');
    }



}
