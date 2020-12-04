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
            'id'=> 'doc1',
            'password' => '123456',
            'roll' => 'doctor'
        ]);

     
    }
}
