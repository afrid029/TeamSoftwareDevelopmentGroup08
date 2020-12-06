<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        DB::table('all_users')->insert([
            'id'=> 'doc2',
            'password' => '123456',
            'roll' => 'doctor'
        ]);

        DB::table('doctors')->insert([
            'Doc_id' => 'doc2',
            'Doc_name' => 'Ajantha',
            'Doc_email' => 'mafrid029@gmail.com',
            'Doc_addr' => '98,KKp, Road Kalmunai 03',
            'Doc_pNum' => '0771234567',
            'password' => '123456'
        ]);

     
    }
}
