<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    public $timestamps = false;
    protected $fillable = [
          'provider_user_id',  'provider',  'user'// đây là những trường mà đã create trong
        // cơ sở dữ liệu
    ];

    protected $primaryKey = 'user_id';
 	protected $table = 'tbl_social';

    public function login(){
        return $this->belongsTo('App\Login', 'user');
    }

}
