<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //Cách xóa delete sử dụng cách xóa mềm trong laravel gọi là soft-delete
    // dữ liệu nó vẫn trong bảng những mà nó ẩn đi trong câu truy vấn
    use SoftDeletes;

    public $timestamps = false; //set time to false
//    protected $guarded = [];
    protected $fillable = [
       'meta_keywords' ,'product_name','product_quantity','product_sold','price','promontion_price','image','desc','content','category_id','status','new','views_count','deleted_at'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'products';// chỉ định tên table vì ko may mình đặt model sai
//    public function images()
//    {
//        //hasMany có nhiều
//        return $this->hasMany(ProductImage::class, 'product_id');
//    }
//    public function tags()
//    {
//        return $this
//            // bảng trung gian là product_tags, khóa liên quan đến bảng model product này chính là product_id và tag_id
//            ->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')
//            ->withTimestamps();
//    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }
    public function category()
    {
        // truyền khóa ngoại này nằm trong bảng product là category_id
        return $this->belongsTo(Category::class, 'category_id');
    }


}
