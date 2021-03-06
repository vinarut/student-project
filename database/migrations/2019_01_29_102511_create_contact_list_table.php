<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('info_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('address');
            $table->text('relation')->nullable();
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
        Schema::dropIfExists('contact_list');
    }
}
