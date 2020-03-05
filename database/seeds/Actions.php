<?php

use Illuminate\Database\Seeder;

class Actions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Actions')->insert([
            ['role_id'=>1,'Action_id'=>1],
            ['role_id'=>1,'Action_id'=>2],
            ['role_id'=>1,'Action_id'=>3],
        ]);
    }
}
