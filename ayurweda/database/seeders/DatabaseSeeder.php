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
            'id'=> 'doc3',
            'password' => '123456',
            'roll' => 'doctor'
        ]);
        DB::table('all_users')->insert([
            'id'=> 'doc4',
            'password' => '1234',
            'roll' => 'doctor'
        ]);

        DB::table('doctors')->insert([
            'Doc_id' => 'doc3',
            'Doc_name' => 'Ajantha',
            'Doc_email' => 'mafrid029@gmail.com',
            'Doc_addr' => '98,KKp, Road Kalmunai 03',
            'Doc_pNum' => '0771234567',
            'Doc_im' => '',
            'password' => '123456'
        ]);
        DB::table('doctors')->insert([
            'Doc_id' => 'doc4',
            'Doc_name' => 'Ajantha',
            'Doc_email' => 'mafrid029@gmail.com',
            'Doc_addr' => '98,KKp, Road Kalmunai 03',
            'Doc_pNum' => '0771234567',
            'Doc_im' => '',
            'password' => '1234'
        ]);

    }
}
