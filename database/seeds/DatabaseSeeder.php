<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cenovniks')->insert([
        	'id' => 1,
            'pregled' => 1000,
            'krajPregled' => 1000,
            'potvrda' => 1000,
            'vakcina' => 1000,
            'rane' => 1000,
            'sistematski' => 1000
        ]);
    }
}
