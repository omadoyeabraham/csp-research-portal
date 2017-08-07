<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResearchReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_reports', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ticker_id');
            $table->string('report_name');
            $table->date('date');
            $table->string('file_url');
             $table->string('company_name');
             $table->string('report_type')->default("N/A");
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
        Schema::drop('research_reports');
    }
}
