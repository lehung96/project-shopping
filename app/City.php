<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //model thành phố
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name_city', 'type'
    ];
    protected $primaryKey = 'matp';//mã thành phố là khóa chính
 	protected $table = 'tbl_tinhthanhpho';// thuộc bảng tỉnh thành phố
}
