<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegedetailTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // College table
        Schema::create('collegedetail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('college_code')->unique();
            $table->string('name')->nullable();
            $table->longText('college_description')->nullable();
            $table->string('eligibility_10_perc')->nullable();
            $table->string('eligibility_12_perc')->nullable();
            $table->string('eligibility_age')->nullable();
            $table->string('admission_mode')->nullable();
            $table->string('college_rank')->nullable();
            $table->string('address')->nullable();
            $table->string('seats')->nullable();
            $table->string('fee_first_year')->nullable();
            $table->string('fee_four_years')->nullable();
            $table->string('hostel_fees')->nullable();
            $table->string('govt_private')->nullable();
            $table->string('pic_url')->nullable();
            $table->string('placement')->nullable();
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
        // Delete Schema
        Schema::drop('collegedetail');
    }
}
