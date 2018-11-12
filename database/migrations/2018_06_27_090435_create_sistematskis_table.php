<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSistematskisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sistematskis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('godina');
            $table->text('mesec');
            $table->integer('tezina');
            $table->integer('duzina');
            $table->integer('obim');
            $table->text('ishrana');
            $table->text('vakcina');
            $table->integer('zubi');
            $table->text('krv');
            $table->text('kukovi');
            $table->text('zakljucak');
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
        Schema::drop('sistematskis');
    }
}
