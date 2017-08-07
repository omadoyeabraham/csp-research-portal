<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreasuryBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treasury_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->double("FI_90D_opening_bid",8,2);
            $table->double("FI_90D_closing_bid",8,2);
            $table->double("FI_90D_change",8,2);
            $table->double("FI_180D_opening_bid",8,2);
            $table->double("FI_180D_closing_bid",8,2);
            $table->double("FI_180D_change",8,2);
            $table->double("FI_360D_opening_bid",8,2);
            $table->double("FI_360D_closing_bid",8,2);
            $table->double("FI_360D_change",8,2);
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
        Schema::dropIfExists('treasury_bills');
    }
}
