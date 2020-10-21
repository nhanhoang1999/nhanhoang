<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
        	[
        		'c_name'=>'SamSung',
        		'c_slug'=>str::slug('SamSung')
        	],
        	[
        		'c_name'=>'Iphone',
        		'c_slug'=>str::slug('IPhone')
        	],
        ];
        DB::table('db_categories')->insert($data);
    }
}
