<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deoTela');
            $table->text('povreda');
            $table->text('terapija');
            $table->integer('id_pacijent')->unsigned();
            $table->foreign('id_pacijent')->references('id')->on('pacijents')->onDelete('cascade');
            $table->integer('id_doktor')->unsigned();
            $table->foreign('id_doktor')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('ranes');
    }
}
