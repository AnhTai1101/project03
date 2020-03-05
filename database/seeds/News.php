<?php

use Illuminate\Database\Seeder;

class News extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('News')->insert([
            [
                'name'=>'Mẹo',
                'title'=>'Hướng dẫn làm đẹp',
                'content'=>'Không chỉ có quần áo có thể giúp ta làm đẹp mình!',
                'description'=>'Vẻ đẹp tâm hồn là vẻ đẹp có thể khiến bất cứ chàng trai nào đỗ gục mà nhan sắc không thể đánh đổ được.',
                'image'=>"tai.jpg",
                'time'=>2020/12/12
            ]
        ]);
    }
}
