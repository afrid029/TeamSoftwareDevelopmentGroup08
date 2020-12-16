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
            'password' => 'doc1@',
            'roll' => 'doctor'
        ]);
        DB::table('doctors')->insert([
            'Doc_id' => 'doc1',
            'Doc_name' => 'Ajantha',
            'Doc_email' => 'mafrid029@gmail.com',
            'Doc_addr' => '98,KKp, Road Kalmunai 03',
            'Doc_pNum' => '0771234567',
            'Doc_im' => '',
            'password' => 'doc1@'
        ]);

        DB::table('all_users')->insert([
            'id'=> 'doc2',
            'password' => 'doc2@',
            'roll' => 'doctor'
        ]);
        DB::table('doctors')->insert([
            'Doc_id' => 'doc2',
            'Doc_name' => 'M Rashel',
            'Doc_email' => 'rashel2@gmail.com',
            'Doc_addr' => 'No.2,vegas road,Anuradhapura',
            'Doc_pNum' => '0771242678',
            'Doc_im' => '',
            'password' => 'doc2@'
        ]);

        DB::table('all_users')->insert([
            'id'=> 'doc3',
            'password' => 'doc3@',
            'roll' => 'doctor'
        ]);
        DB::table('doctors')->insert([
            'Doc_id' => 'doc3',
            'Doc_name' => 'Dilki Hasara',
            'Doc_email' => 'dhwways@gmail.com',
            'Doc_addr' => 'No.618/80 E, Buddhagaya mawatha, Anuradhapura',
            'Doc_pNum' => '0715397001',
            'Doc_im' => '',
            'password' => 'doc3@'
        ]);

        DB::table('all_users')->insert([
            'id'=> 'doc4',
            'password' => 'doc4@',
            'roll' => 'doctor'
        ]);
        DB::table('doctors')->insert([
            'Doc_id' => 'doc4',
            'Doc_name' => 'John Edward',
            'Doc_email' => 'jedward4@gmail.com',
            'Doc_addr' => 'No.723, Jeland road, Colombo',
            'Doc_pNum' => '0762937515',
            'Doc_im' => '',
            'password' => 'doc4@'
        ]);

        DB::table('all_users')->insert([
            'id'=> 'doc5',
            'password' => 'doc5@',
            'roll' => 'doctor'
        ]);
        DB::table('doctors')->insert([
            'Doc_id' => 'doc5',
            'Doc_name' => 'Maya Helboda',
            'Doc_email' => 'mayah5@gmail.com',
            'Doc_addr' => 'No.567, Dehiowita, Kegalle',
            'Doc_pNum' => '0710890067',
            'Doc_im' => '',
            'password' => 'doc5@'
        ]);

        DB::table('all_users')->insert([
            'id'=> 'doc6',
            'password' => 'doc6@',
            'roll' => 'doctor'
        ]);
        DB::table('doctors')->insert([
            'Doc_id' => 'doc6',
            'Doc_name' => 'Jenny Rudrigo',
            'Doc_email' => 'jrudrigo6@gmail.com',
            'Doc_addr' => 'No.10/D, Stage 3,Badulla',
            'Doc_pNum' => '0715671110',
            'Doc_im' => '',
            'password' => 'doc6@'
        ]);

        DB::table('all_users')->insert([
            'id'=> 'doc7',
            'password' => 'doc7@',
            'roll' => 'doctor'
        ]);
        DB::table('doctors')->insert([
            'Doc_id' => 'doc7',
            'Doc_name' => 'Luvis johnathan',
            'Doc_email' => 'luvis7@gmail.com',
            'Doc_addr' => 'No.28, Nelumkulama, Anuradhapura',
            'Doc_pNum' => '0761002340',
            'Doc_im' => '',
            'password' => 'doc7@'
        ]);

        DB::table('all_users')->insert([
            'id'=> 'doc8',
            'password' => 'doc8@',
            'roll' => 'doctor'
        ]);
        DB::table('doctors')->insert([
            'Doc_id' => 'doc8',
            'Doc_name' => 'Jessy Mogan',
            'Doc_email' => 'jmogan@gmail.com',
            'Doc_addr' => 'N0.365,stage 2,AK road,Hambanthota',
            'Doc_pNum' => '0712098765',
            'Doc_im' => '',
            'password' => 'doc8@'
        ]);

        DB::table('all_users')->insert([
            'id'=> 'doc9',
            'password' => 'doc9@',
            'roll' => 'doctor'
        ]);
        DB::table('doctors')->insert([
            'Doc_id' => 'doc9',
            'Doc_name' => 'Jessica Wishcholk',
            'Doc_email' => 'jwish9@gmail.com',
            'Doc_addr' => 'N0.78, kks road, Jaffna',
            'Doc_pNum' => '0762895601',
            'Doc_im' => '',
            'password' => 'doc9@'
        ]);

        DB::table('all_users')->insert([
            'id'=> 'doc10',
            'password' => 'doc10@',
            'roll' => 'doctor'
        ]);
        DB::table('doctors')->insert([
            'Doc_id' => 'doc10',
            'Doc_name' => 'Sarath Guruge',
            'Doc_email' => 'sarath10@gmail.com',
            'Doc_addr' => 'No.45, stage 5, Kelaniya',
            'Doc_pNum' => '0712306793',
            'Doc_im' => '',
            'password' => 'doc10@'
        ]);

        DB::table('all_users')->insert([
            'id'=> 'prod1',
            'password' => 'prod1@',
            'roll' => 'medicine producer'
        ]);
        DB::table('medicine_producers')->insert([
            'Pro_id' => 'prod1',
            'Pro_name' => 'Nishantha Herath',
            'Pro_addr' => 'No.34, stage 7, Negombo',
            'Pro_pNum' => '0716894567',
            'Pro_im' => '',
            'password' => 'prod1@'
        ]);

        DB::table('all_users')->insert([
            'id'=> 'pat1',
            'password' => 'pat1@',
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat1',
            'Pat_name' => 'Nishantha Silva',
            'Pat_email' => 'nsilva@gmail.com',
            'Pat_addr' => 'No.12, J5 road, Dabulla',
            'Pat_pNum' => '0718926789',
            'Pimage' => '',
            'age' => '56',
            'gender' => 'male',
            'guardian' => 'Damayanthi Silva',
            'password' => 'pat1@'
        ]);

        DB::table('all_users')->insert([
            'id'=> 'pat2',
            'password' => 'pat2@',
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat2',
            'Pat_name' => 'Danushka Hewage',
            'Pat_email' => 'hewage@gmail.com',
            'Pat_addr' => 'No.40, S5 road, Kurunegala',
            'Pat_pNum' => '0778923456',
            'Pimage' => '',
            'age' => '33',
            'gender' => 'male',
            'guardian' => 'Nelka Hewage',
            'password' => 'pat2@'
        ]);

        DB::table('all_users')->insert([
            'id'=> 'pat3',
            'password' => 'pat3@',
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat3',
            'Pat_name' => 'Nathali Dias',
            'Pat_email' => 'nathali@gmail.com',
            'Pat_addr' => 'No.13, N5 road, Ampara',
            'Pat_pNum' => '0716789023',
            'Pimage' => '',
            'age' => '40',
            'gender' => 'female',
            'guardian' => 'Danushka Dias',
            'password' => 'pat3@'
        ]);
        //pat4
        DB::table('all_users')->insert([
            'id'=> 'pat4',
            'password' => 'pat4@',
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat4',
            'Pat_name' => 'Pithuja Sritharan',
            'Pat_email' => 'Pithuja&S@gmail.com',
            'Pat_addr' => 'No.3, ABC road, Batticaloa',
            'Pat_pNum' => '0711212023',
            'Pimage' => '',
            'age' => '20',
            'gender' => 'female',
            'guardian' => 'kamala Sritharan',
            'password' => 'pat4@'
        ]);
        //pat5
        DB::table('all_users')->insert([
            'id'=> 'pat5',
            'password' => 'pat5@',
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat5',
            'Pat_name' => 'Vincent Jackshan',
            'Pat_email' => 'Vincent@gmail.com',
            'Pat_addr' => 'No.13, BB road, Ampara',
            'Pat_pNum' => '0716789023',
            'Pimage' => '',
            'age' => '55',
            'gender' => 'female',
            'guardian' => 'Priya Jackshan',
            'password' => 'pat5@'
        ]);
        //pat6
        DB::table('all_users')->insert([
            'id'=> 'pat6',
            'password' => 'pat6@',
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat6',
            'Pat_name' => 'Maaran Suresh',
            'Pat_email' => 'Sureshss@gmail.com',
            'Pat_addr' => 'No.2, Valluvan road, Ampara',
            'Pat_pNum' => '0716789023',
            'Pimage' => '',
            'age' => '23',
            'gender' => 'male',
            'guardian' => 'Ramesh Suresh',
            'password' => 'pat6@'
        ]);
        //pat7
        DB::table('all_users')->insert([
            'id'=> 'pat7',
            'password' => 'pat7@',
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat7',
            'Pat_name' => 'Jenu Kirisanth',
            'Pat_email' => 'Kirisanth111@gmail.com',
            'Pat_addr' => 'No.13, Pannikar road, Ampara',
            'Pat_pNum' => '0776789122',
            'Pimage' => '',
            'age' => '32',
            'gender' => 'male',
            'guardian' => 'Bala Kirisanth',
            'password' => 'pat7@'
        ]);
        //pat8
        DB::table('all_users')->insert([
            'id'=> 'pat8',
            'password' => 'pat8@',
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat8',
            'Pat_name' => 'Sarath Balu',
            'Pat_email' => 'BaluBalu12@gmail.com',
            'Pat_addr' => 'No.13, VSS road, Ampara',
            'Pat_pNum' => '0716712323',
            'Pimage' => '',
            'age' => '80',
            'gender' => 'male',
            'guardian' => 'Vishva Helan',
            'password' => 'pat8@'
        ]);
        //pat9
        DB::table('all_users')->insert([
            'id'=> 'pat9',
            'password' => 'pat9@',
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat9',
            'Pat_name' => 'John Devid',
            'Pat_email' => 'DevidAR@gmail.com',
            'Pat_addr' => 'No.13, N5 road, Ampara',
            'Pat_pNum' => '0776781223',
            'Pimage' => '',
            'age' => '48',
            'gender' => 'male',
            'guardian' => 'Danush Devid',
            'password' => 'pat9@'
        ]);
        //pat10
        DB::table('all_users')->insert([
            'id'=> 'pat10',
            'password' => 'pat10@',
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat10',
            'Pat_name' => 'Kajan Varan',
            'Pat_email' => 'Kajan@gmail.com',
            'Pat_addr' => 'No.1, KS road, Ampara',
            'Pat_pNum' => '0776789023',
            'Pimage' => '',
            'age' => '30',
            'gender' => 'male',
            'guardian' => 'Kamal Varan',
            'password' => 'pat10@'
        ]);

        
    }
}
