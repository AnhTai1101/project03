<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert([
            ['name'=>'Le Cong Tai','email'=>'lecongtai@yahoo.com.vn','image'=>'tai.jpg','password'=>'$2y$10$36F21fhCTOg92m96ZGn/UeS7jf6K2IzZuir3AMfr1.uc9mlaDaQ3C','phone'=>'0968805001'],

        ]);
    }
}
