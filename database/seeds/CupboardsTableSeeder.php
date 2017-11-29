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
        //region TEST FRIDGE
        DB::table('cupboards')->insert([
            'name' => 'Testing fridge',
            'description' => 'I am a sample fridge containing some basic aliments. Try adding some food in here to test the application!',
            'temperature' => 5,
            'volume' => 200
            ]);
        //endregion TEST FRIDGE

    }
}
