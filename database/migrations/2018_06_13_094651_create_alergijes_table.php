<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlergijesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alergijes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('napomene');
            $table->integer('id_pacijent')->unsigned();
            $table->foreign('id_pacijent')->references('id')->on('pacijents')->onDelete('cascade');
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
        Schema::drop('alergijes');
    }
}
