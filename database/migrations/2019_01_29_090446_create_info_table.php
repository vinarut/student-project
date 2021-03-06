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
            $table->string('childs_first_name');
            $table->string('childs_last_name');
            $table->string('DOB');
            $table->string('street_address');
            $table->string('town');
            $table->string('zip');
            $table->string('mothers_first_name');
            $table->string('mothers_last_name');
            $table->string('home_phone');
            $table->string('mothers_cell_phone');
            $table->string('mothers_employer');
            $table->string('mothers_city');
            $table->string('mothers_state');
            $table->string('mothers_work_phone');
            $table->string('fathers_first_name');
            $table->string('fathers_last_name');
            $table->string('fathers_cell_phone');
            $table->string('fathers_employer');
            $table->string('fathers_city');
            $table->string('fathers_state');
            $table->string('fathers_work_phone');
            $table->string('primary_email_address');
            $table->string('allergies');
            $table->text('allergies_describe')->nullable();
            $table->string('special_medical_history');
            $table->text('special_medical_history_describe')->nullable();
            $table->string('epi_pen');
            $table->string('release_form');
            $table->text('photo_choice');
            $table->string('directory_agree');
            $table->string('your_name');
            $table->string('date');
            $table->text('signature');
            $table->ipAddress('ip');
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
        Schema::dropIfExists('info');
    }
}
