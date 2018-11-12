<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVakcinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vakcinas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bcg')->default(0);
            $table->integer('hbprva')->default(0);
            $table->integer('hbdruga')->default(0);
            $table->integer('hbtreca')->default(0);
            $table->integer('hbtridoze')->default(0);
            $table->integer('dtpprva')->default(0);
            $table->integer('dtpdruga')->default(0);
            $table->integer('dtptreca')->default(0);
            $table->integer('dtpp1')->default(0);
            $table->integer('opvprva')->default(0);
            $table->integer('opvdruga')->default(0);
            $table->integer('opvtreca')->default(0);
            $table->integer('opvp1')->default(0);
            $table->integer('opvp2')->default(0);
            $table->integer('opvp3')->default(0);
            $table->integer('mmrb')->default(0);
            $table->integer('mmrp')->default(0);
            $table->integer('hibprva')->default(0);
            $table->integer('hibdruga')->default(0);
            $table->integer('hibtreca')->default(0);
            $table->integer('dtp2')->default(0);
            $table->integer('dtp3')->default(0);
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
        Schema::drop('vakcinas');
    }
}
