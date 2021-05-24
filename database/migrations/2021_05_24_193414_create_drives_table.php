<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_shift')->nullable();
            $table->foreign('id_shift')
                ->references('id')
                ->on('shifts')
                ->onDelete('set null');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->float('distance');
            $table->float('fare');
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
        Schema::dropIfExists('drives');
    }
}
