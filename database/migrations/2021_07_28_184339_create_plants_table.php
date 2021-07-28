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
            $table->id();
            $table->char('SKU', 20)->unique();
            $table->string('slug')->unique();
            $table->string('plant_name');
            $table->longText('plant_description')->nullable();
            $table->longText('care_rules')->nullable();
            $table->unsignedInteger('indoor_light');
            $table->unsignedInteger('outdoor_light');
            $table->boolean('air_cleaner')->default(false);
            $table->boolean('pet_friendly')->default(false);
            $table->unsignedInteger('difficulty');
            $table->unsignedInteger('height');
            $table->unsignedInteger('size');
            $table->unsignedInteger('price');
            $table->unsignedInteger('discount')->nullable()->comment('in currency, not in percent');
            $table->integer('units_in_stock')->default(0);
            $table->integer('units_on_order')->nullable(); //TODO mb ok mb not
            $table->boolean('plant_available')->default(true);
            $table->boolean('discount_available')->default(false);
            $table->binary('picture')->nullable();
            $table->unsignedDouble('ranking')->default(0);
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
        Schema::dropIfExists('plants');
    }
}
