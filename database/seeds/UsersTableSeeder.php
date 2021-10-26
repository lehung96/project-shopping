<?php

use Illuminate\Database\Seeder;
use App\Admin;// sử dụng model Admin để kết nối với csdl
use App\Roles;// model Roles tương tác với csdl

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Admin::truncate();//hàm truncate() có nghĩa là khi phát hiện cơ sở dữ liệu mới thì
        //  sẽ xóa tất cả dữ liệu trong Table admin_roles này để update cái vừa tạo
        DB::table('admin_roles')->truncate();

        //đầu tiên là khai báo biến $adminRoles là quyền adminRoles thì sẽ sử dụng model Roles
        //điều kiện là where vào trong model Roles lấy cột name = admin và cột display_name
        $adminRoles = Roles::where('name','admin')->first();
        $userRoles = Roles::where('name','user')->first();
        $devRoles = Roles::where('name','dev')->first();
        $contentRoles = Roles::where('name','content')->first();


        //tạo tài khoản quyền admin
        $admin = Admin::create([
            'admin_name' => 'lehungadmin',
            'admin_email' => 'levanhung96.hh@gmail.com',
            'admin_phone' => '123456789',
            'admin_password' => md5('123456')
        ]);

        //tạo tài khoản quyền guest(khách hàng )
        $user = Admin::create([
            'admin_name' => 'hunguser',
            'admin_email' => 'vanhung.hh@gmail.com',
            'admin_phone' => '123456789',
            'admin_password' => md5('123456')
        ]);

        //tạo tài khoản quyền dev(phát triển hệ thống )
        $dev = Admin::create([
            'admin_name' => 'hungdev',
            'admin_email' => 'lehung.hh@gmail.com',
            'admin_phone' => '123456789',
            'admin_password' => md5('123456')
        ]);

        //tạo tài khoản quyền content(nội dung )
        $content = Admin::create([
            'admin_name' => 'hungcontent',
            'admin_email' => 'lehung.@gmail.com',
            'admin_phone' => '123456789',
            'admin_password' => md5('123456')
        ]);


        //câu lệnh này là thêm quyền $admin->roles() nghĩa là thêm quyền admin attach($adminRoles);
        //attach($adminRoles); nghĩa là attach cái lehungadmin = quyền là admin
        $admin->roles()->attach($adminRoles);
        $user->roles()->attach($userRoles);
        $dev->roles()->attach($devRoles);
        $content->roles()->attach($contentRoles);

        factory(App\Admin::class, 20)->create();

    }
}
