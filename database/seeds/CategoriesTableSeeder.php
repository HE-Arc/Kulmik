<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  => Basic categories
     * @return void
     */
    public function run()
    {
        //region BASIC FOOD
        DB::table('categories')->insert([
            'name' => 'glucides',
            'description' => 'sucres et produits sucrés',
            'category_id' => null]);

        DB::table('categories')->insert([
            'name' => 'lipides',
            'description' => 'matière grasse',
            'category_id' => null]);

        DB::table('categories')->insert([
            'name' => 'protéines',
            'description' => 'viandes, poissons, oeufs, alternatives',
            'category_id' => null]);

        DB::table('categories')->insert([
            'name' => 'légumes et fruits',
            'description' => '',
            'category_id' => null]);

        DB::table('categories')->insert([
            'name' => 'céréales et dérivés',
            'description' => 'pain, pâtes, patates',
            'category_id' => null]);
        //endregion BASIC FOOD

        //region DRINKS
        DB::table('categories')->insert([
            'name' => 'boissons',
            'description' => '',
            'category_id' => null]);

        DB::table('categories')->insert([
            'name' => 'alcool',
            'description' => '',
            'category_id' => 6]);

        DB::table('categories')->insert([
            'name' => 'sucrées',
            'description' => '',
            'category_id' => 6]);

        DB::table('categories')->insert([
            'name' => 'jus',
            'description' => '',
            'category_id' => 6]);
        //endregion DRINKS

    }
}
