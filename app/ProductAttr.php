<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttr extends Model
{

    public $timestamps = false; //set time to false
    protected $fillable = [
        'id_product', 'id_attr'
    ];
    protected $primaryKey = 'productattr_id';//khóa chính
    protected $table = 'product_attrs';// chỉ định tên table vì ko may mình đặt model sai
}
