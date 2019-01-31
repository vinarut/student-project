<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_individuals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('info_id');
            $table->string('name');
            $table->string('phone');
            $table->foreign('info_id')->references('id')->on('info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additional_individuals');
    }
}
