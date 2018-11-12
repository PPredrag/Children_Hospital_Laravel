<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cenes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pregled')->default(0);
            $table->integer('krajPregled')->default(0);
            $table->integer('potvrda')->default(0);
            $table->integer('vakcina')->default(0);
            $table->integer('rane')->default(0);
            $table->integer('sistematski')->default(0);
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
        Schema::drop('cenes');
    }
}
