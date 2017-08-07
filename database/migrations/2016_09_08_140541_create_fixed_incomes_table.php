<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFixedIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_incomes', function(Blueprint $table) {
            $table->increments('id');
            $table->date('date')->unique();

            $table->double('FI_5Y_opening_yield', 8, 2);
            $table->double('FI_5Y_closing_yield', 8, 2);
            $table->double('FI_5Y_change',5,2 );

            $table->double('FI_10Y_opening_yield', 8, 2);
            $table->double('FI_10Y_closing_yield', 8, 2);
            $table->double('FI_10Y_change',5,2 );

            $table->double('FI_20Y_opening_yield', 8, 2);
            $table->double('FI_20Y_closing_yield', 8, 2);
            $table->double('FI_20Y_change',5,2 );

            $table->double('FI_90D_opening_bid', 8, 2);
            $table->double('FI_90D_closing_bid', 8, 2);
            $table->double('FI_90D_change',5,2 );

            $table->double('FI_180D_opening_bid', 8, 2);
            $table->double('FI_180D_closing_bid', 8, 2);
            $table->double('FI_180D_change',5,2 );

            $table->double('FI_360D_opening_bid', 8, 2);
            $table->double('FI_360D_closing_bid', 8, 2);
            $table->double('FI_360D_change',5,2 );

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
        Schema::drop('fixed_incomes');
    }
}
