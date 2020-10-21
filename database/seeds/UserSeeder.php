<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        $adminRoles = Roles::where('r_name','admin')->first();
        $authorRoles = Roles::where('r_name','author')->first();
        $userRoles = Roles::where('r_name','user')->first();

        $admin = Admin::create([
            'name' => 'Nguyen Nhan Hoang',
            'email' => 'nhanhoang11099@gmail.com',
            'phone' => '0392231341',
            'password' => bcrypt('hoang1999')
        ]);
        $author = Admin::create([
            'name' => 'Pham Van Hanh',
            'email' => 'phamhanh15031999@gmail.com',
            'phone' => '0932023992',
            'password' => bcrypt('123456')
        ]);
        $user = Admin::create([
            'name' => 'Pham Van Lang',
            'email' => 'phamlang111111@gmail.com',
            'phone' => '0932023993',
            'password' => bcrypt('123456')
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);
    }
}
