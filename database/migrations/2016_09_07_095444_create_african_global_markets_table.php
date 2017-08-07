<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAfricanGlobalMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('african_global_markets', function(Blueprint $table) {
            $table->increments('id');
            $table->date('date')->default( date("Y-m-d") )->unique();
            $table->double('JAISH_INDEX');
            $table->double('JAISH_CHANGE');
            $table->double('NSE_ASI_INDEX');
            $table->double('NSE_ASI_CHANGE');
            $table->double('GGSECI_INDEX');
            $table->double('GGSECI_CHANGE');
            $table->double('EGX30_INDEX');
            $table->double('EGX30_CHANGE');
            $table->double('SP_500_INDEX');
            $table->double('SP_500_CHANGE');
            $table->double('DJIA_INDEX');
            $table->double('DJIA_CHANGE');
            $table->double('FTSE_INDEX');
            $table->double('FTSE_CHANGE');
            $table->double('NIKKEL_INDEX');
            $table->double('NIKKEL_CHANGE');
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
        Schema::drop('african_global_markets');
    }
}
