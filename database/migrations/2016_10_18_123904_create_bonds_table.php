<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonds_table', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("bond_id");
            $table->string("bond_name");
            $table->string("bond_series");
            $table->string("date")->unique();
            $table->string("issue_date");
            $table->string("maturity_date");
            $table->string("coupon");
            $table->string("ttm");
            $table->string("bid_ytm");
            $table->string("offer_ytm");
            $table->string("bid_price");
            $table->string("offer_price");
            $table->string("tenor");
            $table->string("duration");
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
        Schema::dropIfExists('bonds_table');
    }
}
