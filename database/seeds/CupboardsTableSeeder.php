<?php

use Illuminate\Database\Seeder;

class CupboardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  => Used to populate the cupboards' examples
     * @return void
     */
    public function run()
    {
        //region 1 PERSON
        DB::table('cupboards')->insert([
            'name' => 'One person\'s fridge',
            'description' => 'I am a sample fridge containing some basic aliments.',
            'temperature' => 5,
            'volume' => 200
            ]);
        //endregion 1 PERSON

        //region COUPLE
        DB::table('cupboards')->insert([
            'name' => 'Couple\'s fridge',
            'description' => 'I am a sample fridge containing some basic aliments.',
            'temperature' => 5,
            'volume' => 350
        ]);
        //endregion COUPLE

        //region FAMILY OF 4
        DB::table('cupboards')->insert([
            'name' => 'Family of 4 fridge',
            'description' => 'I am a sample fridge containing some basic aliments.',
            'temperature' => 5,
            'volume' => 400
        ]);
        //endregion FAMILY OF 4

    }
}
