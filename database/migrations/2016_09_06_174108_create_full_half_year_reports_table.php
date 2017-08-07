<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFullHalfYearReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('full_half_year_reports', function(Blueprint $table) {
            $table->increments('id');
            $table->string('file_url');
            $table->string('report_type')->default('FullHalfYearReport');
            $table->date('date');
            $table->string('report_name');
            $table->text('preview');
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
        Schema::drop('full_half_year_reports');
    }
}
