<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficerStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officer_status', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('officer_id')->unsigned()->index();
            $table->integer('status_id')->unsigned()->index();
            $table->integer('office_id')->unsigned()->index();
            $table->string('dates');
            
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->foreign('officer_id')->references('id')->on('officers')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('officer_status');
    }
}
