<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarketSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_summaries', function(Blueprint $table) {
            $table->increments('id');
            $table->string('file_url');
            $table->string('report_type')->default('Market Summary');
            $table->string('report_name');
            $table->date('date')->unique();
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
        Schema::drop('market_summaries');
    }
}
