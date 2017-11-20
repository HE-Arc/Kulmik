<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AlimentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        DB::table('aliments')->insert([
            'name' => 'paquet de chips',
            'weight' => 200,
            'quantity' => 2,    //'Y-m-d H:i:s'
            'buy_date'  => Carbon::parse('2017-11-08'),
            'expiration_date' => Carbon::parse('2018-11-08'),
            'cupboard_id' => 1,
            'category_id' => 1]);
    }
}
