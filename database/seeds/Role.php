<?php

use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Role')->insert([
            ['name'=>'Boss','users_id'=>1],

        ]);
    }
}
