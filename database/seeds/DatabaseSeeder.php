<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Documentation link : https://laravel.com/docs/5.5/seeding
     * @return void
     */
    public function run()
    {
        //Just a user for test
        /*DB::table('users')->insert([
            'name' => 'Guest',
            'email' => 'guest' . \Carbon\Carbon::now()->toDateTimeString(),
            'password' => bcrypt('123456')
        ]);*/

        if(DB::table('categories')->count() == 0){
            $this->call([
                CategoriesTableSeeder::class]);
        }
        if(DB::table('users')->where('name', 'Guest')->count() != 0){
            $this->call([
                CupboardsTableSeeder::class,
                AlimentsTableSeeder::class]);
        }
    }
}
