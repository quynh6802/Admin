<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->delete();
        $banners = [
            ['id' => '1', 'name' => 'banner 1', 'image' => '', 'image_extra' => '', 'link' => '', 'intro' => '', 'description' => '', 'location' => '', 'order_no' => 0, 'status' => 1],
            ['id' => '2', 'name' => 'banner 2', 'image' => '', 'image_extra' => '', 'link' => '', 'intro' => '', 'description' => '', 'location' => '', 'order_no' => 0, 'status' => 1],
            ['id' => '3', 'name' => 'banner 3', 'image' => '', 'image_extra' => '', 'link' => '', 'intro' => '', 'description' => '', 'location' => '', 'order_no' => 0, 'status' => 1],
            ['id' => '4', 'name' => 'banner 4', 'image' => '', 'image_extra' => '', 'link' => '', 'intro' => '', 'description' => '', 'location' => '', 'order_no' => 0, 'status' => 1],
        ];
        DB::table('banners')->insert($banners);
    }
}
