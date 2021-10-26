<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model

{
    use SoftDeletes;
    public $timestamps = false; //set time to false
    // khi có thuộc tính $fillable thì những cái cái thuộc tính 'name', 'parent_id','slug',
    // nó sẽ được bao gồm trong câu query và insert
    protected $fillable = [
        // trong mảng này quy định trường nào dduocj phép insert
        'name', 'parent_id','slug','deleted_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'menus';// chỉ định tên table vì ko may mình đặt model sai

    // Từ danh mục cha muốn lấy ra danh mục con thì mình định nghĩa ra phương thức trung gian
//là categoryChildrent()
    public function MenusChildrent()
    {
        // danh mục cha và danh mục con là mối quan hệ 1 nhiều
        //danh mục cha lấy ra danh mục con là hasMany, tên đầu tiên là Menu model
        // trường lấy tất cả danh mục con là parent_id
        return $this->hasMany(Menu::class, 'parent_id');
    }

}
