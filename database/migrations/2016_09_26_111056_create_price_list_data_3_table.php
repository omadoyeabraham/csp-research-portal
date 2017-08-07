<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceListData3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_list_data_three', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->string('ticker');
            $table->double('previous_close',8,2);
            $table->double('open',8,2);
            $table->double('high',8,2);
            $table->double('low',8,2);
            $table->double('close',8,2);
            $table->double('change',8,2);
            $table->integer('number_of_deals');
            $table->string('volume');
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
        Schema::dropIfExists('price_list_data_three');
    }
}
