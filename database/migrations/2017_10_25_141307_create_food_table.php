<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('weight');
            $table->integer('quantity');
            $table->date('buy_date');
            $table->date('expiration_date');
            $table->timestamps();

            //Foreign keys
            $table->integer('cupboard_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('cupboard_id')->references('id')->on('cupboard');
            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food');
    }
}
