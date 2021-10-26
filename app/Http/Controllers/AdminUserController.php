<?php

namespace App\Http\Controllers;

use App\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminUserController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User $user ,Role $role){
        // code này nó chạy khi mà nó trỏ đến phương thức
        //new cái class user việc đầu tiên nó phải chạy cái  construct
        // construct nó sẽ gán biến $this->user = $user;
        $this->user = $user;
        $this->role = $role;

    }

    // create method index list user
 public function index(){

     $users = $this->user->paginate(10);
     return view('admin.user.index', compact('users'));
 }
 public function create(){
     $roles = $this->role->all();
     // sau khi có biến role bên add mình tiến hành foreach
     return view('admin.user.add' ,compact('roles'));
 }
 public function store(Request $request)
 {
//        dd('store');
     //thực hiện 2 nhiệm vụ
     //1 insert bảng user sau khi có giữ liệu bảng user mình phải insert vào bảng role_user

     try {
         DB::beginTransaction();
         $user = $this->user->create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password)
             //mã hóa = Hash
             //sau khi tạo bản nghi trong table user mình sẽ insert vào bảng trung gian hoàn toàn làm
         ]);
         // dd ra
         //     dd($request->role_id);
         $user->roles()->attach($request->role_id);
         DB::commit();
         //sau khi thành công mình sẽ return ta cái
         return redirect()->route('users.index');
     } catch (\Exception $exception) {
         DB::rollBack();
         Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());

     }

 }
    public function edit($id)
    {
        //edit nhận id mình chuyền lên
        $roles = $this->role->all();
        //lấy ra giá trị trong database ra
        $user = $this->user->find($id);
        $rolesOfUser = $user->roles;
        return view('admin.user.edit', compact('roles', 'user', 'rolesOfUser'));

    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());

        }

    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->user);
    }


}



