<?php

namespace App\Http\Controllers;


use App\pemission;
use App\Role;
use Illuminate\Http\Request;


class AdminRoleController extends Controller
{

    private $role;
    private $pemission;


    //hàm construct sẽ nhận vào model của Role
    public function __construct(Role $role,Pemission $pemission)
    {
        $this->role = $role;
        $this->pemission=$pemission;
    }

    public function index()
    {
        //phương thức index chúng ta sẽ lấy ra tất cả cái role
        //paginate(10); lấy 10 bản ghi trên 1 trang
        $roles = $this->role->paginate(10);
        //compact('roles') truyền biến sang bên index
        return view('admin.role.index', compact('roles'));

    }

    public function create()
    {
        // lấy ra permission cha
        // lấy ra trỏ đến ->get(); lấy ra tất cả ,find() là lấy ra bản nghi đầu tiên
        $pemissionsParent = $this->pemission->where('parent_id', 0)->get();
        dd($pemissionsParent);
        return view('admin.role.add',compact('pemissionsParent'));
    }




}
