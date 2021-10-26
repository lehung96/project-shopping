<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;//sử dụng model Admin để tướng tác với csdl
use Faker\Generator as Faker;
use App\Roles;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
//chuyển đổi từ user sang admin
//dùng admin
$factory->define(Admin::class, function (Faker $faker) {
    return [
        'admin_name' => $faker->name,
        'admin_email' => $faker->unique()->safeEmail,
        'admin_phone' => '0932023999',
        'admin_password' => 'e10adc3949ba59abbe56e057f20f883e', // password
    ];
});

//thêm câu lệnh tao dữ liệu factories cho guest(khách hàng) ở bảng roles( vai trò)
$factory->afterCreating(Admin::class, function($admin,$faker){
    $roles = Roles::where('name','user')->get();
    $admin->roles()->sync($roles->pluck('id_roles')->toArray());
});
