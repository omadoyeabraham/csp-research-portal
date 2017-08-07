<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceListData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_list_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->string('symbol');
            $table->integer('previous_close');
            $table->integer('open');
            $table->integer('high');
            $table->integer('low');
            $table->integer('close');
            $table->integer('change');
            $table->integer('number_of_deals');
            $table->integer('volume');
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
        Schema::dropIfExists('price_list_data');
    }
}
