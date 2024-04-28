<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->delete();
        $contacts = [
            ['id' => 1, 'name' => 'Phạm Văn Quỳnh', 'phone' => '0342459716', 'email' => 'quynh682002@gmail', 'gender' => 'nam', 'address' => 'Thị Trấn Lâm-Ý Yên-Nam Định', 'order_id' => 0, 'status' => 1],
        ];
        DB::table('contacts')->insert($contacts);
    }
}
