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
        $this->call([
            CategoriesTableSeeder::class,
            CupboardsTableSeeder::class,
            AlimentsTableSeeder::class]);
    }
}
