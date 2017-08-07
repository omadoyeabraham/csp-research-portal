<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ticker_id');
            $table->string('company_name');
            $table->string('ticker');
            $table->string('market_classification')->default('N/A');
            $table->string('sector')->default('N/A');
            $table->string('sub_sector')->default('N/A');
            $table->string('address')->default('N/A');
            $table->string('telephone_fax')->default('N/A');
            $table->string('website')->default('N/A');
            $table->string('registrar')->default('N/A');
            $table->string('company_secretary')->default('N/A');
            $table->date('date_listed');
            $table->date('date_of_incorporation');
            $table->string('board_of_directors')->nullable;
            $table->string('market_cap')->default('N/A');
            $table->string('shares_outstanding')->default('N/A');
            $table->string('ownership_structure')->nullable;
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
        Schema::drop('company_profiles');
    }
}
