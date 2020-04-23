<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::disableForeignKeyConstraints(); // For Forgen Key Checks Disable
        Schema::create('medications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('concen');    // Concentration
            $table->longText('desc')->nullable();
            $table->integer('med_id')->unsigned();
            $table->foreign('med_id')->references('id')->on('medicalforms')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
          Schema::enableForeignKeyConstraints(); // For Forgen Key Checks Enable
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medications');
    }
}
