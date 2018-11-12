<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenovniksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cenovniks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pregled')->default('1000');
            $table->integer('krajPregled')->default('1000');
            $table->integer('potvrda')->default('1000');
            $table->integer('vakcina')->default('1000');
            $table->integer('rane')->default('1000');
            $table->integer('sistematski')->default('1000');
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
        Schema::drop('cenovniks');
    }
}
