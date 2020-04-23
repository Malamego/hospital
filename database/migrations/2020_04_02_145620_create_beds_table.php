<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints(); // For Forgen Key Checks Disable
        Schema::create('beds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->longText('desc')->nullable();
            $table->enum('status', ['open', 'close'])->default('open');
            $table->integer('dep_id')->unsigned();
            $table->foreign('dep_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('beds');
    }
}
