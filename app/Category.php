<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //Cách xóa delete sử dụng cách xóa mềm trong laravel gọi là soft-delete
    // dữ liệu nó vẫn trong bảng những mà nó ẩn đi trong câu truy vấn
    use SoftDeletes;

    public $timestamps = false; //set time to false
    protected $fillable = [
         'meta_keywords','name', 'slug','desc','parent_id','status'
    ];
    protected $primaryKey = 'category_id';
    protected $table = 'categories';// chỉ định tên table vì ko may mình đặt model sai


    // Từ danh mục cha muốn lấy ra danh mục con thì mình định nghĩa ra phương thức trung gian
    //là categoryChildrent()
    public function categoryChildrent()
    {
        // danh mục cha và danh mục con là mối quan hệ 1 nhiều
        //danh mục cha lấy ra danh mục con là hasMany, tên đầu tiên là Category model
        // trường lấy tất cả danh mục con là parent_id
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}


