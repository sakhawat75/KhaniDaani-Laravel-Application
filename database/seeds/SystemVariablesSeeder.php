<?php

use Illuminate\Database\Seeder;

class SystemVariablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('system_variables')->insert([
		    'service_percentage' => 2
	    ]);
    }
}
