<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficerPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officer_position', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('officer_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->integer('office_id')->unsigned();
            $table->string('note')->default('empty');
            
            $table->timestamps();
            
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->foreign('officer_id')->references('id')->on('officers')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('officer_position');
    }
}
