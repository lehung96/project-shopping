<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'admin_email', 'admin_password', 'admin_name','admin_phone'
    ];
    protected $primaryKey = 'admin_id';
 	protected $table = 'tbl_admin';


 	//Viết hàm roles(vai trò )
    //Một Admin có rất nhiều vai trò
 	public function roles(){
 		return $this->belongsToMany('App\Roles');
 	}
    // 	public function roles(){
// 		return $this->belongsToMany(Roles::class,'admin_roles','admin_admin_id','roles_id_roles');
// 	}

 	//Hàm này mặc định sẽ tự hiểu cột là password
 	public function getAuthPassword(){
 		return $this->admin_password;
 	}
// //AnyRoles có nghĩa là nhiều quyền
    public function hasAnyRoles($roles){
        return null !==  $this->roles()->whereIn('name',$roles)->first();
    }
 	//hasRole có nghĩa là một quyền
 	public function hasRole($role){
 		return null !==  $this->roles()->where('name',$role)->first();
 	}


}
