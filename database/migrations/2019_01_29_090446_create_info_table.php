<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('childs_name');
            $table->date('DOB');
            $table->string('street_address');
            $table->string('town');
            $table->string('zip');
            $table->string('mothers_name');
            $table->string('home_phone');
            $table->string('mothers_cell_phone');
            $table->string('mothers_employer');
            $table->string('mothers_city');
            $table->string('mothers_state');
            $table->string('mothers_work_phone');
            $table->string('fathers_name');
            $table->string('fathers_cell_phone');
            $table->string('fathers_employer');
            $table->string('fathers_city');
            $table->string('fathers_state');
            $table->string('fathers_work_phone');
            $table->string('primary_email_address');
            $table->boolean('allergies');
            $table->longText('allergies_describe')->nullable();
            $table->boolean('special_medical_history');
            $table->longText('special_medical_history_describe')->nullable();
            $table->boolean('epi_pen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info');
    }
}