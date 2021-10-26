<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //tạo phương thức là index
    public function index()
    {
        $all_brand_product = Brand::orderBy('brand_id')->get();
//        $all_brand_product = Brand::orderBy('brand_id','DESC')->paginate(2);
//         $all_brand_product = Brand::all();
        return view('admin.brand.index',compact('all_brand_product'));

    }
    public function create()
    {
        $all_brand_products = Brand::orderBy('brand_id','DESC')->get();
        return view('admin.brand.add',compact('all_brand_products'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $brand = new Brand();
        $brand->brand_name = $data['brand_name'];
        $brand->brand_slug = $data['brand_slug'];
        $brand->brand_desc = $data['brand_desc'];
        $brand->brand_status = $data['brand_status'];

        $get_image = $request->file('brand_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.',$get_name_image));

            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/uploads/brand',$new_image);

            $brand->post_image = $new_image;

            $brand->save();
            Session::put('message','Thêm bài viết thành công');
            return redirect()->back();
        }else{
//            Session::put('message','Bạn cần thêm hình ảnh');
            return redirect()->route('brands.index');
        }


    }

}
