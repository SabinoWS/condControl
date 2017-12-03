<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalsTable extends Migration
{

    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('description');
            $table->integer('capacity');

            $table->integer('condominium_id')->unsigned();
            $table->foreign('condominium_id')->references('id')->on('condominiums');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('locals');
    }
}
