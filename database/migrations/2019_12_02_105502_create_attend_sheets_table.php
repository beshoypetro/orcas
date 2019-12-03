<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttendSheetsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attend_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->DATETIME ('checkIn')->nullable();
            $table->DATETIME ('checkOut')->nullable();
            $table->integer('hours')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('attend_sheets');
    }
}
