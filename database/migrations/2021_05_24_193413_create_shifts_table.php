<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->unsignedBigInteger('id_driver')->nullable();
            $table->foreign('id_driver')
                ->references('id')
                ->on('drivers')
                ->onDelete('set null');
                $table->unsignedBigInteger('id_taxi')->nullable();
            $table->foreign('id_taxi')
                ->references('id')
                ->on('taxis')
                ->onDelete('set null');
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
        Schema::dropIfExists('shifts');
    }
}
