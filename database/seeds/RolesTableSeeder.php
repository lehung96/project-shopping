<?php

use Illuminate\Database\Seeder;
use App\Roles;// sử dụng để kết nối với Model Roles
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::truncate();//hàm truncate() có nghĩa là khi phát hiện cơ sở dữ liệu mới thì
        //  sẽ xóa tất cả dữ liệu trong Table tbl_role này để update cái vừa tạo

        //khai báo dữ liệu  Roles (Vai trò) Phân quyền cần thêm sau đó chạy các dòng này ở DatabaseSeeder
        Roles::create(['name' => 'admin', 'display_name' => 'Quản trị hệ thống ']);//vai trò admin
        Roles::create(['name' => 'user', 'display_name' => 'khách hàng']);//vai trò khách hàng
        Roles::create(['name' => 'dev', 'display_name' => 'phát triển hệ thống ']);//vai trò phát triển hệ thống
        Roles::create(['name' => 'content', 'display_name' => 'Chỉnh sửa nội dung ']);//vai trò viết nội dung

    }
}
