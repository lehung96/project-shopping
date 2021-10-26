<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
// câu lệnh truy vấn này  chạy class RolesTableSeeder tạo vai trò
        $this->call(RolesTableSeeder::class);


        //tạo use đăng nhập quyền
        $this->call(UsersTableSeeder::class);
    }
}
