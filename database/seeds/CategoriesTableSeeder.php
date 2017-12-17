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
            'name' => 'carbohydrates',
            'description' => 'bread, cereals, rice, pasta, grains',
            'category_id' => null]);

        DB::table('categories')->insert([
            'name' => 'vegetables',
            'description' => 'carrot, broccoli, salad',
            'category_id' => null]);

        DB::table('categories')->insert([
            'name' => 'fruits',
            'description' => 'orange, banana, apple',
            'category_id' => null]);

        DB::table('categories')->insert([
            'name' => 'dairy products',
            'description' => 'milk, cheese, yogurt',
            'category_id' => null]);

        DB::table('categories')->insert([
            'name' => 'meat and alternatives',
            'description' => 'meat, fish, eggs, nuts, tofu',
            'category_id' => null]);

        DB::table('categories')->insert([
            'name' => 'fats and oils',
            'description' => 'sunflower oil, coco butter',
            'category_id' => null]);

        DB::table('categories')->insert([
            'name' => 'sweets',
            'description' => 'chocolate, bonbons, sugar',
            'category_id' => null]);

        DB::table('categories')->insert([
            'name' => 'condiments and seasoning',
            'description' => 'salt, pepper, paprika',
            'category_id' => null]);
        //endregion BASIC FOOD

        //region DRINKS
        DB::table('categories')->insert([
            'name' => 'drinks',
            'description' => 'water, tea',
            'category_id' => null]);

        //region SUB CATEGORIES
        DB::table('categories')->insert([
            'name' => 'alcohol',
            'description' => 'beer, wine, liquor',
            'category_id' => 6]);

        DB::table('categories')->insert([
            'name' => 'sweet beverage',
            'description' => 'lemonade',
            'category_id' => 6]);

        DB::table('categories')->insert([
            'name' => 'juice',
            'description' => 'orange juice, tomato juice',
            'category_id' => 6]);
        //endregion SUB CATEGORIES
        //endregion DRINKS

    }
}
