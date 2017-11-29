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
        DB::table('users')->insert([
            'name' => 'Toto',
            'email' => 'toto@he-arc.ch',
            'password' => bcrypt('secret')
            ]);

        $this->call([
            CategoriesTableSeeder::class,
            CupboardsTableSeeder::class,
            AlimentsTableSeeder::class]);
    }
}
