<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ticker_id');
            $table->date('date');
            $table->string('report_name');
            $table->string('company_name');
            $table->string('file_url');
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
        Schema::drop('presentations');
    }
}
