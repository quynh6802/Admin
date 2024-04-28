<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();
        $posts = [
            ['id' => 1, 'name' => 'Điện thoại siêu thông minh', 'slug' => 'dien-thoai-sieu-thong-minh', 'image' => '', 'category_id' => 9, 'intro' => '', 'detail_description' => '', 'status' => 1],
            ['id' => 2, 'name' => 'Điện thoại siêu thông minh', 'slug' => 'dien-thoai-sieu-thong-minh', 'image' => '', 'category_id' => 9, 'intro' => '', 'detail_description' => '', 'status' => 1],
            ['id' => 3, 'name' => 'Điện thoại siêu thông minh', 'slug' => 'dien-thoai-sieu-thong-minh', 'image' => '', 'category_id' => 9, 'intro' => '', 'detail_description' => '', 'status' => 1],
            ['id' => 4, 'name' => 'Điện thoại siêu thông minh', 'slug' => 'dien-thoai-sieu-thong-minh', 'image' => '', 'category_id' => 9, 'intro' => '', 'detail_description' => '', 'status' => 1],
        ];
        DB::table('posts')->insert($posts);
    }
}
