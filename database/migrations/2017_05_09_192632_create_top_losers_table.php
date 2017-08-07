<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopLosersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_losers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->unique();
            $table->string('loser_one');
            $table->string('loser_one_change');
            $table->string('loser_two');
            $table->string('loser_two_change');
            $table->string('loser_three');
            $table->string('loser_three_change');
            $table->string('loser_four');
            $table->string('loser_four_change');
            $table->string('loser_five');
            $table->string('loser_five_change');
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
        Schema::dropIfExists('top_losers');
    }
}
