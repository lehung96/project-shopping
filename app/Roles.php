<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name','display_name'
    ];
    protected $primaryKey = 'id_roles';
 	protected $table = 'tbl_role';

 	public function admin(){//hàm này trả về
 	    //belongsToMany(thuộc về nhiều) mối quan hệ nhiều nhiều
 //return $this->belongsToMany('App\Admin');nghĩa là trong admin (quản trị )có Roles
//có Roles (vai trò) thuộc nhiều admin ngược lại admin có nhiều vai trò

 		return $this->belongsToMany('App\Admin');
 	}

}
