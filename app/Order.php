<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //Cách xóa delete sử dụng cách xóa mềm trong laravel gọi là soft-delete
    // dữ liệu nó vẫn trong bảng những mà nó ẩn đi trong câu truy vấn
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    public $timestamps = false; //set time to false
    protected $fillable = [
        'customer_id', 'shipping_id', 'order_status','order_code','created_at','order_date'
    ];
    protected $primaryKey = 'order_id';
    protected $table = 'orders';

}
