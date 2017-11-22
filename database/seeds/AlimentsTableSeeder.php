<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AlimentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * links :
     *         https://stackoverflow.com/questions/41807853/how-to-seed-a-date-field-in-laravel-5-3
     *         https://laracasts.com/discuss/channels/laravel/how-to-seed-timestamps-field
     * @return void
     */
        public function run()
    {

        //region CONTAINER 1
        DB::table('aliments')->insert([
            'name' => 'Mustard',
            'weight' => 200,
            'quantity' => 1,    //'Y-m-d H:i:s'
            'buy_date'  => Carbon::parse('2017-11-08'),
            'expiration_date' => Carbon::parse('2018-11-08'),
            'cupboard_id' => 1,
            'category_id' => 2]);

        DB::table('aliments')->insert([
            'name' => 'Orange Juice',
            'weight' => 1000,
            'quantity' => 1,    //'Y-m-d H:i:s'
            'buy_date'  => Carbon::parse('2017-11-08'),
            'expiration_date' => Carbon::parse('2017-12-08'),
            'cupboard_id' => 1,
            'category_id' => 9]);

        DB::table('aliments')->insert([
            'name' => 'Eggs',
            'weight' => 50,
            'quantity' => 12,    //'Y-m-d H:i:s'
            'buy_date'  => Carbon::parse('2017-11-08'),
            'expiration_date' => Carbon::parse('2018-11-08'),
            'cupboard_id' => 1,
            'category_id' => 3]);
        //endregion CONTAINER 1
    }
}
