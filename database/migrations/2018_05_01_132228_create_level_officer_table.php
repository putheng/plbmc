<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelOfficerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_officer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('officer_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->integer('office_id')->unsigned()->default('0');;
            $table->string('note')->default('empty');
            
            $table->timestamps();
            
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->foreign('officer_id')->references('id')->on('officers')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level_officer');
    }
}
