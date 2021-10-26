<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'order_code', 'product_id', 'product_name','product_price','product_sales_quantity'
    ];
    protected $primaryKey = 'order_details_id';
    protected $table = 'order_details';

    //Tiếp tục lấy chi tiết đơn hàng (order_detail phải dựa vào model của Product)
    //tạo một function product
    public function product(){
        //trả về belongsTo thuộc về một sản phẩm là model App\Product dựa trên produc_id của đơn hàng
        //lấy produc_id so sánh với bảng products để lấy ra sản phẩm
        //tại sao belongsTo vì mỗi sản phẩm trong cái chi tiết hóa đơn thuộc một sản phẩm trong bảng Products
        //relationship mối quan hệ 1:1belongsTo
        return $this->belongsTo('App\Product','product_id');
    }
}
