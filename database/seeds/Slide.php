<?php

use Illuminate\Database\Seeder;

class Slide extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Slide')->insert([
            ['name'=>'Sản phẩm được khuyến mại','image'=>'slide-01.jpg'],
            ['name'=>'Sản phẩm được khuyến mại 2','image'=>'slide-02.jpg'],
            ['name'=>'Sản phẩm được khuyến mại 3','image'=>'slide-03.jpg'],
            ['name'=>'Sản phẩm được khuyến mại 4','image'=>'slide-04.jpg'],
            ['name'=>'Sản phẩm được khuyến mại 5','image'=>'slide-05.jpg'],
            ['name'=>'Sản phẩm được khuyến mại 6','image'=>'slide-06.jpg'],
        ]);
    }
}
