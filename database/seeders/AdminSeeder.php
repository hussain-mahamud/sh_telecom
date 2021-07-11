<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Sohel123@//heroku
        DB::table('users')->insert([
        	'name'=>'Sohel',
        	'email'=>'soheltelecom67@gmail.com',
        	'password'=>Hash::make('Sohel123@')

        ]);
    }
}
