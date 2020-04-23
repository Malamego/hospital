<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::disableForeignKeyConstraints(); // For Forgen Key Checks Disable
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('pat_id')->unsigned();
            $table->foreign('pat_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('bed_id')->unsigned();
            $table->foreign('bed_id')->references('id')->on('beds')->onUpdate('cascade')->onDelete('cascade');            
            $table->float('urea');
            $table->float('creatinie');
            $table->float('potassium');
            $table->float('alt');
            $table->float('ast');
            $table->float('bilirubin');
            $table->float('albumin');
            $table->enum('dispensed', ['yes', 'no'])->default('no');
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
        Schema::dropIfExists('prescriptions');
    }
}
