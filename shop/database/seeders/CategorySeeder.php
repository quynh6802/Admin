<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $categories = [
            ['id' => 1, 'name' => 'Laptops', 'slug' => 'laptops', 'image' => '', 'type' => 1, 'parent' => 0, 'status' => 1],
            ['id' => 2, 'name' => 'Smartphones', 'slug' => 'smartphones', 'image' => '', 'type' => 1, 'parent' => 0, 'status' => 1],
            ['id' => 3, 'name' => 'Cameras', 'slug' => 'cameras', 'image' => '', 'type' => 1, 'parent' => 0, 'status' => 1],
            ['id' => 4, 'name' => 'Accessories', 'slug' => 'accessories', 'image' => '', 'type' => 1, 'parent' => 0, 'status' => 1],
            ['id' => 5, 'name' => 'Lenovo', 'slug' => 'lenovo', 'image' => '', 'type' => 1, 'parent' => 1, 'status' => 1],
            ['id' => 6, 'name' => 'Iphone', 'slug' => 'iphone', 'image' => '', 'type' => 1, 'parent' => 2, 'status' => 1],
            ['id' => 7, 'name' => 'Questek', 'slug' => 'questek', 'image' => '', 'type' => 1, 'parent' => 3, 'status' => 1],
            ['id' => 8, 'name' => 'Earphone', 'slug' => 'earphone', 'image' => '', 'type' => 1, 'parent' => 4, 'status' => 1],
            ['id' => 9, 'name' => 'Post 1', 'slug' => 'post-1', 'image' => '', 'type' => 1, 'parent' => 0, 'status' => 1],
        ];
        DB::table('categories')->insert($categories);
    }
}
