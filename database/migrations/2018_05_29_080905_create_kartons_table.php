<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartons', function (Blueprint $table) {
            $table->increments('id');
            $table->text('simptomi');
            $table->text('dijagnoza');
            $table->text('lecenje');
            $table->text('lek');
            $table->integer('id_pacijent')->unsigned();
            $table->integer('id_doktor')->unsigned();
            $table->foreign('id_pacijent')->references('id')->on('pacijents')->onDelete('cascade');
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
        Schema::drop('kartons');
    }
}
