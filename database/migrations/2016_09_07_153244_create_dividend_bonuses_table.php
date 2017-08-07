<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDividendBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dividend_bonuses', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ticker_id');
            $table->string('company_name');
            $table->string('period');
            $table->string('dividend')->default("N/A");
            $table->string('bonus')->default("N/A");
            $table->date('closure_of_register')->nullable();
            $table->date('agm_date')->nullable();
            $table->date('payment_date')->nullable();
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
        Schema::drop('dividend_bonuses');
    }
}
