<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_lists', function(Blueprint $table) {
            $table->increments('id');
            $table->string('file_url');
            $table->string('report_type')->default('Price List');
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
        Schema::drop('price_lists');
    }
}
