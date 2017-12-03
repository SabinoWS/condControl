<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidentHolderTable extends Migration
{
    public function up()
    {
        Schema::create('resident_holder', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('resident_id')->unsigned();
            $table->foreign('resident_id')->references('id')->on('users');

            $table->integer('holder_id')->unsigned();
            $table->foreign('holder_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resident_holder');
    }
}
