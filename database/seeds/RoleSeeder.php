<?php

use Illuminate\Database\Seeder;
use App\Models\Roles;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::truncate();
        Roles::create(['r_name'=>'admin','r_description'=>'Quản trị viên']);
        Roles::create(['r_name'=>'author','r_description'=>'Người viết bài']);
        Roles::create(['r_name'=>'user','r_description'=>'Người dùng nhân viên']);
    }
}
