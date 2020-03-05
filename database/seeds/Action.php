<?php

use Illuminate\Database\Seeder;

class Action extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Action')->insert([
            ['name'=>'Delete User'],
            ['name'=>'Delete Customer'],
            ['name'=>'Update User'],
        ]);
    }
}
