<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('film_name');
            $table->string('datials');
            $table->string('story');
            $table->string('quality');
            $table->integer('year');
            $table->string('cima4u');
            $table->string('dardarkom');
            $table->string('aflm');
            $table->string('cinemalek');
            $table->string('promo');
            $table->string('film_img');
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id_ca')->on('cats');
            $table->integer('chain_id')->nullable()->unsigned();
            $table->foreign('chain_id')->references('id')->on('films');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
