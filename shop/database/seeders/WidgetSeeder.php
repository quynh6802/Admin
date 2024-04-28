<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WidgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('widgets')->delete();
        $widgets = [
            ['id' => 1, 'name' => 'widget 1', 'location' => '', 'content' => '', 'order_no' => 0, 'image' => '', 'link' => '', 'status' => 1],
            ['id' => 2, 'name' => 'widget 1', 'location' => '', 'content' => '', 'order_no' => 0, 'image' => '', 'link' => '', 'status' => 1],
            ['id' => 3, 'name' => 'widget 1', 'location' => '', 'content' => '', 'order_no' => 0, 'image' => '', 'link' => '', 'status' => 1],
            ['id' => 4, 'name' => 'widget 1', 'location' => '', 'content' => '', 'order_no' => 0, 'image' => '', 'link' => '', 'status' => 1],
        ];
        DB::table('widgets')->insert($widgets);
    }
}
