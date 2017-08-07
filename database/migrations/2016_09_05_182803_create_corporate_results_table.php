<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_results', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ticker_id')->default(0);
            $table->date('date')->default(date("Y-m-d"));
            $table->string('report_period');
            $table->bigInteger('turnover');
            $table->integer('dividend');
            $table->bigInteger('pbt');
            $table->bigInteger('pat');
            //$table->bigInteger('gross_earnings');
            $table->string('file_url');
            $table->string('company_name');
            //$table->string('report_name');
             $table->string('report_type')->default("Corporate Result");
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
        Schema::drop('corporate_results');
    }
}
