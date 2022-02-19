<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryI18n extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category_i18n', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_category_id');
            $table->string('language');
            $table->string('name');
            $table->longText('description');
            $table->timestamps();

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
        Schema::table('product_category_i18n', function (Blueprint $table) {
            $table->dropForeign(['product_category_id']);
        });
        Schema::dropIfExists('product_category_i18n');
    }
}
