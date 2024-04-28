<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->delete();
        $menus = [
            ['id' => 1, 'name' => 'home', 'location' => 'main_menu', 'url' => '/', 'parent' => 0, 'order_no' => 0, 'status' => 1],
            ['id' => 2, 'name' => 'category', 'location' => 'main_menu', 'url' => '/', 'parent' => 0, 'order_no' => 0, 'status' => 1],
            ['id' => 3, 'name' => 'product', 'location' => 'main_menu', 'url' => '/', 'parent' => 0, 'order_no' => 0, 'status' => 1],
        ];
        DB::table('menus')->insert($menus);
    }
}
