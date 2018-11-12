<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacijentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacijents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ime');
            $table->string('prezime');
            $table->string('imeroditelja');
            $table->integer('brojtelefona');
            $table->string('pol');
            $table->integer('god_rodjenja');
            $table->integer('lbo');
            $table->string('email');
            $table->timestamps();
            $table->rememberToken();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pacijents');
    }
}
