<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
       'name', 'value'
    ];
    protected $primaryKey = 'attribute_id';//khóa chính
    protected $table = 'attributes';// chỉ định tên table vì ko may mình đặt model sai
}
