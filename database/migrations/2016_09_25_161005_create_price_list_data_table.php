<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceListDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_lists_data', function (Blueprint $table) {
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
            $table->double('volume' ,11,2);
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
        Schema::dropIfExists('price_lists_data');
    }
}
