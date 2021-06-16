<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('SKU', 20);
            $table->string('slug');
            $table->string('product_name');
            $table->longText('product_description')->nullable();
            $table->longText('care_rules')->nullable();
            $table->integer('height');
            $table->unsignedInteger('price');
            $table->unsignedInteger('discount')->nullable()->comment('in currency, not in percent');
            $table->integer('units_in_stock');
            $table->integer('units_on_order');
            $table->boolean('product_available')->default(true);
            $table->boolean('discount_available');
            $table->binary('picture')->nullable();
            $table->integer('ranking')->default(0);
            $table->tinyText('notes')->nullable();
            $table->boolean('is_archived')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
