<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_category_id');
            $table->string('slug')->unique();
            $table->string('botanical_name')->nullable();
            $table->unsignedInteger('indoor_light');
            $table->boolean('air_cleaner')->default(false);
            $table->boolean('pet_friendly')->default(false);
            $table->unsignedInteger('difficulty');
            $table->unsignedInteger('height');
            $table->unsignedInteger('size');
            $table->unsignedDouble('rating')->default(0);
            $table->tinyText('notes')->nullable();
            $table->boolean('is_archived')->default(false);
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('product_category_id')->references('category_id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->dropForeign(['product_category_id']);
        });
        Schema::dropIfExists('plants');
    }
}
