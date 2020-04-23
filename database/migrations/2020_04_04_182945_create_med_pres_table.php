<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedPresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('med_pres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('med_id')->unsigned();
            $table->foreign('med_id')->references('id')->on('medications')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('pres_id')->unsigned();
            $table->foreign('pres_id')->references('id')->on('prescriptions')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('med_pres');
    }
}
