<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sells_slide extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name','price','image','product_id','status',
    ];
    protected $primaryKey = 'sells_slides_id';
    protected $table = 'sells_slides';

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id');
    }
}
