<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pots', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_category_id');
            $table->unsignedInteger('height');
            $table->unsignedInteger('diameter');
            $table->unsignedInteger('material');
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
        Schema::table('pots', function (Blueprint $table) {
            $table->dropForeign(['product_category_id']);
        });
        Schema::dropIfExists('pots');
    }
}
