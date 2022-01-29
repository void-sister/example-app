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
            $table->string('name_ru');
            $table->string('name_uk');
            $table->string('botanical_name')->nullable();
            $table->longText('description_ru')->nullable();
            $table->longText('description_uk')->nullable();
            $table->longText('care_rules_ru')->nullable();
            $table->longText('care_rules_uk')->nullable();
            $table->unsignedInteger('indoor_light');
            $table->boolean('air_cleaner')->default(false);
            $table->boolean('pet_friendly')->default(false);
            $table->unsignedInteger('difficulty');
            $table->unsignedInteger('height');
            $table->unsignedInteger('size');
            $table->binary('picture')->nullable();
            $table->unsignedDouble('ranking')->default(0);
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
