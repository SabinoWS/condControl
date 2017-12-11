<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Photos extends Migration
{
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('message')->nullabe();

            $table->timestamps();
            $table->softDeletes();

            $table->integer('condominium_id')->unsigned();
            $table->foreign('condominium_id')->references('id')->on('condominiums');
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
