<?php

use App\Models\Customer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id'); //todo foreign
            $table->unsignedInteger('region_id');//todo foreign
            $table->string('email')->unique();
            $table->string('f_name');
            $table->string('l_name');
            $table->unsignedInteger('age')->nullable();
            $table->string('inst')->nullable();
            $table->string('fb')->nullable();
            $table->integer('desired_delivery')->default(Customer::DELIVERY_NP);
            $table->integer('last_np_office')->nullable();
            $table->string('zip')->nullable();
            $table->string('city'); //todo ? table?
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
        Schema::dropIfExists('customers');
    }
}
