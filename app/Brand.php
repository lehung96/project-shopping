<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false; //set time to false
    protected $table = 'brand';
    protected $primaryKey = 'brand_id';
    protected $fillable = [
        'brand_name',
        'slug',
        'brand_image',
        'brand_desc',
        'brand_status'
    ];

}
