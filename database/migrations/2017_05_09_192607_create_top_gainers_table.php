<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopGainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_gainers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->unique();
            $table->string('gainer_one');
            $table->string('gainer_one_change');
            $table->string('gainer_two');
            $table->string('gainer_two_change');
            $table->string('gainer_three');
            $table->string('gainer_three_change');
            $table->string('gainer_four');
            $table->string('gainer_four_change');
            $table->string('gainer_five');
            $table->string('gainer_five_change');
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
        Schema::dropIfExists('top_gainers');
    }
}
