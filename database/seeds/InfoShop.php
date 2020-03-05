<?php

use Illuminate\Database\Seeder;

class InfoShop extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_shop')->insert([
            [
                'name'=>'Shop quan ao Timer',
                'bossName'=>'Nguyen thi Phuong Thao',
                'address'=>'Phương Nam Hòa, Quận Thanh Xuân, Thành phố Hà Nội'
            ]
        ]);
    }
}
