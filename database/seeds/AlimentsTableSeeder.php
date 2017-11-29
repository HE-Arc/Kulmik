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

        //region TEST FRIDGE

        //region 2 VEGGIES

        //salad: today
        DB::table('aliments')->insert([
            'name' => 'Salad',
            'weight' => 200,
            'quantity' => 1,
            'buy_date'  => Carbon::today(),
            'expiration_date' => Carbon::today()->addDays(14),
            'cupboard_id' => 1,
            'category_id' => 2]);
        //carrots: 7 days ago
        DB::table('aliments')->insert([
            'name' => 'Carrots',
            'weight' => 500,
            'quantity' => 1,
            'buy_date'  => Carbon::today()->subDays(7),
            'expiration_date' => Carbon::today()->addDays(7),
            'cupboard_id' => 1,
            'category_id' => 2]);
        //eggplants: 14 days ago
        DB::table('aliments')->insert([
            'name' => 'Eggplant',
            'weight' => 300,
            'quantity' => 2,
            'buy_date'  => Carbon::today()->subDays(14),
            'expiration_date' => Carbon::today(),
            'cupboard_id' => 1,
            'category_id' => 2]);
        //veggie mix: 14 days ago
        DB::table('aliments')->insert([
            'name' => 'Veggie mix',
            'weight' => 300,
            'quantity' => 1,
            'buy_date'  => Carbon::today()->subDays(14),
            'expiration_date' => Carbon::today(),
            'cupboard_id' => 1,
            'category_id' => 2]);
        //mini-tomatoes: today
        DB::table('aliments')->insert([
            'name' => 'Mini-tomatoes',
            'weight' => 500,
            'quantity' => 1,
            'buy_date'  => Carbon::today(),
            'expiration_date' => Carbon::today()->addDays(7),
            'cupboard_id' => 1,
            'category_id' => 2]);
        //cucumber: 7 days ago
        DB::table('aliments')->insert([
            'name' => 'Cucumber',
            'weight' => 200,
            'quantity' => 1,
            'buy_date'  => Carbon::today()->subDays(7),
            'expiration_date' => Carbon::today()->addDays(7),
            'cupboard_id' => 1,
            'category_id' => 2]);

        //endregion 2 VEGGIES

        //region 3 FRUITS

        //mango: today
        DB::table('aliments')->insert([
            'name' => 'Mango',
            'weight' => 200,
            'quantity' => 1,
            'buy_date'  => Carbon::today(),
            'expiration_date' => Carbon::today()->addDays(10),
            'cupboard_id' => 1,
            'category_id' => 3]);
        //bananas: 2 days ago
        DB::table('aliments')->insert([
            'name' => 'Bananas pack',
            'weight' => 1000,
            'quantity' => 1,
            'buy_date'  => Carbon::today()->subDays(2),
            'expiration_date' => Carbon::today()->addDays(8),
            'cupboard_id' => 1,
            'category_id' => 3]);
        //lemons: 7 days ago
        DB::table('aliments')->insert([
            'name' => 'Lemon',
            'weight' => 50,
            'quantity' => 6,
            'buy_date'  => Carbon::today()->subDays(7),
            'expiration_date' => Carbon::today()->addDays(7),
            'cupboard_id' => 1,
            'category_id' => 3]);

        //endregion 3 FRUITS

        //region 4 DAIRY

        //feta: today
        DB::table('aliments')->insert([
            'name' => 'Fet cheese',
            'weight' => 200,
            'quantity' => 1,
            'buy_date'  => Carbon::today(),
            'expiration_date' => Carbon::today()->addMonth(),
            'cupboard_id' => 1,
            'category_id' => 4]);
        //Gruyère: 7 days ago
        DB::table('aliments')->insert([
            'name' => 'Gruyère cheese',
            'weight' => 200,
            'quantity' => 1,
            'buy_date'  => Carbon::today()->subDays(7),
            'expiration_date' => Carbon::today()->subDays(7)->addMonth(),
            'cupboard_id' => 1,
            'category_id' => 4]);
        //yogurt: 7 days ago
        DB::table('aliments')->insert([
            'name' => 'Chocolate yogurt',
            'weight' => 125,
            'quantity' => 2,
            'buy_date'  => Carbon::today()->subDays(7),
            'expiration_date' => Carbon::today()->addDay(),
            'cupboard_id' => 1,
            'category_id' => 4]);
        //yogurt: today
        DB::table('aliments')->insert([
            'name' => 'Strawberry yogurt',
            'weight' => 125,
            'quantity' => 4,
            'buy_date'  => Carbon::today(),
            'expiration_date' => Carbon::today()->addMonth(),
            'cupboard_id' => 1,
            'category_id' => 4]);
        //milk: 2 months ago
        DB::table('aliments')->insert([
            'name' => 'Milk',
            'weight' => 1000,
            'quantity' => 1,
            'buy_date'  => Carbon::today()->subMonths(2),
            'expiration_date' => Carbon::today()->subDay(),
            'cupboard_id' => 1,
            'category_id' => 4]);

        //endregion 4 DAIRY

        //region 5 MEAT + ALT

        //eggs: yesterday
        DB::table('aliments')->insert([
            'name' => 'Eggs',
            'weight' => 60,
            'quantity' => 6,
            'buy_date'  => Carbon::yesterday(),
            'expiration_date' => Carbon::yesterday()->addMonth(),
            'cupboard_id' => 1,
            'category_id' => 5]);
        //ham: yesterday
        DB::table('aliments')->insert([
            'name' => 'Ham pack',
            'weight' => 350,
            'quantity' => 1,
            'buy_date'  => Carbon::yesterday(),
            'expiration_date' => Carbon::yesterday()->addMonth(),
            'cupboard_id' => 1,
            'category_id' => 5]);
        //chicken: 7 days ago
        DB::table('aliments')->insert([
            'name' => 'Chicken leftover',
            'weight' => 200,
            'quantity' => 6,
            'buy_date'  => Carbon::yesterday(),
            'expiration_date' => Carbon::yesterday()->addDays(3),
            'cupboard_id' => 1,
            'category_id' => 5]);
        //beef steaks: today
        DB::table('aliments')->insert([
            'name' => 'Beef steaks',
            'weight' => 150,
            'quantity' => 2,
            'buy_date'  => Carbon::today(),
            'expiration_date' => Carbon::today()->addWeek(),
            'cupboard_id' => 1,
            'category_id' => 5]);
        //hummus
        DB::table('aliments')->insert([
            'name' => 'Hummus',
            'weight' => 150,
            'quantity' => 1,
            'buy_date'  => Carbon::today()->subMonth(),
            'expiration_date' => Carbon::today()->addMonths(3),
            'cupboard_id' => 1,
            'category_id' => 5]);

        //endregion 5 MEAT + ALT

        //region 6 FAT + OILS

        //mayonnaise: 3 months ago
        DB::table('aliments')->insert([
            'name' => 'Mayonnaise',
            'weight' => 250,
            'quantity' => 1,
            'buy_date'  => Carbon::today()->subMonths(3),
            'expiration_date' => Carbon::today()->subMonths(3)->addMonths(6),
            'cupboard_id' => 1,
            'category_id' => 6]);
        //mustard: 2 months ago
        DB::table('aliments')->insert([
            'name' => 'Mustard',
            'weight' => 250,
            'quantity' => 1,
            'buy_date'  => Carbon::today()->subMonths(3),
            'expiration_date' => Carbon::today()->subMonths(3)->addMonths(6),
            'cupboard_id' => 1,
            'category_id' => 6]);
        //soy sauce
        DB::table('aliments')->insert([
            'name' => 'Soy sauce',
            'weight' => 400,
            'quantity' => 1,
            'buy_date'  => Carbon::today()->subMonths(3),
            'expiration_date' => Carbon::today()->addYear(),
            'cupboard_id' => 1,
            'category_id' => 6]);

        //endregion 6 FAT + OILS

        //region 9 DRINKS

        //orange juice - 12
        DB::table('aliments')->insert([
            'name' => 'Orange juice',
            'weight' => 1000,
            'quantity' => 1,
            'buy_date'  => Carbon::today()->subMonths(2),
            'expiration_date' => Carbon::today()->addMonth(),
            'cupboard_id' => 1,
            'category_id' => 12]);
        //beers - 10
        DB::table('aliments')->insert([
            'name' => 'Cardinal beers',
            'weight' => 330,
            'quantity' => 6,
            'buy_date'  => Carbon::today(),
            'expiration_date' => Carbon::today()->addMonths(3),
            'cupboard_id' => 1,
            'category_id' => 10]);
        //ice tea - 11
        DB::table('aliments')->insert([
            'name' => 'Ice tea',
            'weight' => 1000,
            'quantity' => 1,
            'buy_date'  => Carbon::today(),
            'expiration_date' => Carbon::today()->addMonths(2),
            'cupboard_id' => 1,
            'category_id' => 11]);

        //endregion 9 DRINKS

        //endregion TEST FRIDGE
    }
}
