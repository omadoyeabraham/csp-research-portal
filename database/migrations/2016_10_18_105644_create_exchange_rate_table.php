<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangeRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_rate', function (Blueprint $table) {
            $table->increments('id');
            $table->double("ngn_gbp_parallel", 8,2);
            $table->double("ngn_gbp_official", 8,2);
            $table->double("ngn_usd_parallel", 8,2);
            $table->double("ngn_usd_official", 8,2);
            $table->double("ngn_eur_parallel", 8,2);
            $table->double("ngn_eur_official", 8,2);
            $table->date("date")->unique();
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
        Schema::dropIfExists('exchange_rate');
    }
}
