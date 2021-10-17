<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('topOne')->nullable();
            $table->string('topOneLink')->nullable();
            $table->string('downOne')->nullable();
            $table->string('downOneLink')->nullable();
            $table->string('firstSquare')->nullable();
            $table->string('firstSquareLink')->nullable();
            $table->string('secondSquare')->nullable();
            $table->string('secondSquareLink')->nullable();
            $table->string('thirdSquare')->nullable();
            $table->string('thirdSquareLink')->nullable();
            $table->string('fourthSquare')->nullable();
            $table->string('fourthSquareLink')->nullable();
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
        Schema::dropIfExists('advertisements');
    }
}
