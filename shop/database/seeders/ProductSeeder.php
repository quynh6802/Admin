<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        $products = [
            ['id' => 1, 'name' => 'Iphone Xs', 'slug' => 'iphone-xs', 'image' => '', 'image_extra' => '', 'category_id' => 6, 'quantity' => 200, 'promotion' => 100, 'import_price' => 8000000, 'price' => 10000000, 'size' => '', 'color' => 'black', 'intro' => '', 'description' => '', 'detail_description' => '', 'status' => 1],
            ['id' => 2, 'name' => 'Laptop Lenovo v14', 'slug' => 'laptop-lenovo-v14', 'image' => '', 'image_extra' => '', 'category_id' => 5, 'quantity' => 200, 'promotion' => 20, 'import_price' => 12000000, 'price' => 15000000, 'size' => '', 'color' => 'white', 'intro' => '', 'description' => '', 'detail_description' => '', 'status' => 1],
            ['id' => 3, 'name' => 'Sony drc', 'slug' => 'sony-drc', 'image' => '', 'image_extra' => '', 'category_id' => 7, 'quantity' => 150, 'promotion' => 5, 'import_price' => 1000000, 'price' => 13000000, 'size' => '', 'color' => 'black', 'intro' => '', 'description' => '', 'detail_description' => '', 'status' => 1],
            ['id' => 4, 'name' => 'Airport pro ', 'slug' => 'airport-pro', 'image' => '', 'image_extra' => '', 'category_id' => 8, 'quantity' => 250, 'promotion' => 0, 'import_price' => 8000000, 'price' => 10000000, 'size' => '', 'color' => 'black', 'intro' => '', 'description' => '', 'detail_description' => '', 'status' => 1],
        ];
        DB::table('products')->insert($products);
    }
}
