<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('size')->after('height');
            $table->integer('indoor_light')->after('care_rules');
            $table->integer('outdoor_light')->after('indoor_light');
            $table->boolean('air_cleaner')->after('outdoor_light')->default(0);
            $table->boolean('pet_friendly')->after('air_cleaner')->default(0);
            $table->integer('difficulty')->after('pet_friendly');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['size', 'indoor_light', 'outdoor_light', 'air_cleaner', 'pet_friendly', 'difficulty']);
        });
    }
}
