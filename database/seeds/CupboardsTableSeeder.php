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
        //cupboard 1    -
        DB::table('cupboards')->insert([
            'name' => 'single man\'s fridge',
            'description' => 'this is a sample fridge',
            'temperature' => 5,
            'volume' => 200
            ]);
        //cupboard 2

        // ...
    }
}
