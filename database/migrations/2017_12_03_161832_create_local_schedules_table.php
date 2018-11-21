<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalSchedulesTable extends Migration
{

    public function up()
    {
        Schema::create('local_schedules', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('day');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('local_id')->unsigned();
            $table->foreign('local_id')->references('id')->on('locals');

            $table->timestamp('reservation_date')->default('2018-01-01-');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('local_schedules');
    }
}
