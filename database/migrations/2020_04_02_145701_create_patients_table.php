<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::disableForeignKeyConstraints(); // For Forgen Key Checks Disable
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->integer('age');
            $table->integer('weight')->nullable();
            $table->string('image')->nullable();
            $table->string('phone'); // For mobile Phone
            $table->integer('dep_id')->default('1'); // To know Dep name
            $table->integer('bed_id')->unsigned();
            $table->foreign('bed_id')->references('id')->on('beds')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('email')->nullable();
            $table->date('regdate');
            $table->enum('sex', ['male', 'female']);
            $table->enum('smoker', ['yes', 'no']);
            $table->enum('hypertensive', ['yes', 'no']);
            $table->enum('diabetic', ['yes', 'no']);
            $table->longtext('history'); // History
            $table->longtext('ecg'); // رسم القلب
            $table->longtext('echo'); // رسم القلب باكهربا
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
        Schema::dropIfExists('patients');
    }
}
