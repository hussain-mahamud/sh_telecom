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
    	//Sohel123
        DB::table('users')->insert([
        	'name'=>'Sohel',
        	'email'=>'example.com',
        	'password'=>Hash::make('sohel123')

        ]);
    }
}
