<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->string('nse_asi');
            $table->string('market_cap');
            $table->string('volume_traded');
            $table->string('value_traded');
            $table->string('no_of_deals');
            $table->string('daily_change');
            $table->string('qtd');
            $table->string('ytd');
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
        Schema::dropIfExists('market_data');
    }
}
