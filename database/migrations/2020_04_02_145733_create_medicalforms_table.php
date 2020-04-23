<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::disableForeignKeyConstraints(); // For Forgen Key Checks Disable
        Schema::create('medicalforms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('desc')->nullable();
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
        Schema::dropIfExists('medicalforms');
    }
}
