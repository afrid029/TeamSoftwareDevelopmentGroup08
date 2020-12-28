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
        
        //doctor sample data
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
        // producer sample data
        DB::table('all_users')->insert([
            'id'=> 'prod1',
            'password' => 'prod1@',
            'roll' => 'producer'
        ]);
        DB::table('medicine_producers')->insert([
            'Pro_id' => 'prod1',
            'Pro_name' => 'Nishantha Herath',
            'Pro_addr' => 'No.34, stage 7, Negombo',
            'Pro_pNum' => '0716894567',
            'Pro_im' => '',
            'password' => 'prod1@'
        ]);
        //patient sample data
        DB::table('all_users')->insert([
            'id'=> 'pat1',
            'password' => 'pat1@',
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat1',
            'Pat_name' => 'Nishantha Silva',
            'Pat_email' => 'nsilva@gmail.com',
            'Pat_addr' => 'No.12, J5 road, Dambulla',
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
		
		
		
		//Pharmacist sample data
        DB::table('all_users')->insert([
            'id'=> 'pha1',
            'password' => 'pha1@',
            'roll' => 'pharmacist'
        ]);
        DB::table('pharmacists')->insert([
            'Phar_id' => 'pha1',
            'Phar_name' => 'Karan Saran',
            'Phar_addr' => 'No.1, AML road, Ampara',
            'Phar_pNum' => '0776789023',
            'password' => 'pha1@'
        ]);
        
        //medicines

        DB::table('medicines')->insert([
            'Med_id'=>'med1',
            'Med_name' => 'Ashwagandha',
            'description' => 'Ashwagandha is an Ayurvedic spice that may help your body manage stress more effectively. It may also lower your blood sugar levels and improve sleep, memory, muscle growth, and male fertility.',
        ]);
        DB::table('medicines')->insert([
            'Med_id'=>'med2',
            'Med_name' => 'Boswellia',
            'description' => 'Boswellia is an Ayurvedic spice with anti-inflammatory properties. It may reduce joint pain, enhance oral health, and improve digestion, as well as increase breathing capacity in people with chronic asthma.',
            
        ]);
        DB::table('medicines')->insert([
            'Med_id'=>'med3',
            'Med_name' => 'Brahmi',
            'description' => 'Brahmi is an Ayurvedic herb believed to lower inflammation, improve brain function, and reduce symptoms of ADHD. It may also increase your body’s ability to deal with stress, though more research is needed.',
            
        ]);
        DB::table('medicines')->insert([
            'Med_id'=>'med4',
            'Med_name' => 'Cumin',
            'description' => 'Cumin is an Ayurvedic spice commonly used to add flavor to meals. It may decrease symptoms of IBS, improve risk factors for type 2 diabetes and heart disease, and perhaps even offer some protection against foodborne infection.',
            
        ]);
        DB::table('medicines')->insert([
            'Med_id'=>'med5',
            'Med_name' => 'Turmeric',
            'description' => 'Turmeric is the Ayurvedic spice that gives curry its yellow color. Curcumin, its main compound, may help reduce inflammation and improve heart and brain health. However, large amounts are likely needed to attain these benefits.',
            
        ]);
        DB::table('medicines')->insert([
            'Med_id'=>'med6',
            'Med_name' => 'Licorice',
            'description' => 'Licorice root is an Ayurvedic spice that may help reduce inflammation and protect against various infections. It may also treat digestive problems and relieve skin irritations.',
            
        ]);
        DB::table('medicines')->insert([
            'Med_id'=>'med7',
            'Med_name' => 'Bitter melon',
            'description' => 'Bitter melon is an Ayurvedic spice that may help lower blood sugar levels and boost insulin secretion. It may also reduce LDL (bad) cholesterol levels, though more research is needed before strong conclusions can be made.',
            
        ]);
        DB::table('medicines')->insert([
            'Med_id'=>'med8',
            'Med_name' => 'Cardamom',
            'description' => 'Cardamom is an Ayurvedic spice that may lower blood pressure, improve breathing, and potentially help stomach ulcers heal. However, more research is necessary.',
            
        ]);
        DB::table('medicines')->insert([
            'Med_id'=>'med9',
            'Med_name' => 'Triphala',
            'description' => 'Triphala is an ancient herbal remedy with antioxidant, anti-inflammatory, and antibacterial effects. Triphala may have various health benefits, such as improving oral and digestive health and supporting skin healing.',
            
        ]);
        DB::table('medicines')->insert([
            'Med_id'=>'med10',
            'Med_name' => 'Licorice root',
            'description' => 'Licorice root, which is considered one of the worlds oldest herbal remedies, comes from the root of the licorice plant (Glycyrrhiza glabra) ( 1 ). Native to Western Asia and Southern Europe, licorice has long been used to treat various ailments and flavor candies, drinks, and medicines'
            
        ]);
        DB::table('medicines')->insert([
            'Med_id'=>'med11',
            'Med_name' => 'Gotu kola',
            'description'=>'Centella asiatica, commonly known as Indian pennywort or Asiatic pennywort, is a herbaceous, perennial plant in the flowering plant family Apiaceae. It is native to the wetlands in Asia. It is used as a culinary vegetable and as a medicinal herb'
        ]);
        DB::table('medicines')->insert([
            'Med_id'=>'med12',
            'Med_name' => 'Triphalachurna',
            'description'=>'Triphala has been used in traditional Ayurvedic medicine since ancient times as a multi-purpose treatment for symptoms ranging from stomach ailments to dental cavities. It is also believed to promote longevity and overall health'
        ]);
   
       
        //maintain medicine stock
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med1',
            'Med_name' => 'Ashwagandha',
            'unitprice' => '30',
            'stock_qty' => '200',
            
            'Wlimit'=>'50',
            
            'manufactureDate' => '2020-02-02',
            'expireDate' => '2022-02-02'
        ]);
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med2',
            'Med_name' => 'Boswellia',
            'unitprice' => '50',
            'stock_qty' => '250',
          
            'Wlimit'=>'75',
            'manufactureDate' => '2020-04-02',
            'expireDate' => '2023-04-02'
        ]);
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med3',
            'Med_name' => 'Brahmi',
            'unitprice' => '90',
            'stock_qty' => '150',
           
            'Wlimit'=>'100',
            'manufactureDate' => '2020-04-08',
            'expireDate' => '2023-04-08'
        ]);
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med4',
            'Med_name' => 'Cumin',
            'unitprice' => '45',
            'stock_qty' => '70',
            
            'Wlimit'=>'50',
            'manufactureDate' => '2020-04-08',
            'expireDate' => '2021-04-08'
        ]);
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med5',
            'Med_name' => 'Turmeric',
            'unitprice' => '100',
            'stock_qty' => '450',
           
            'Wlimit'=>'100',
            'manufactureDate' => '2020-04-08',
            'expireDate' => '2023-04-08'
        ]);
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med6',
            'Med_name' => 'Licorice',
            'unitprice' => '80',
            'stock_qty' => '90',
       
            'Wlimit'=>'50',
            'manufactureDate' => '2020-04-08',
            'expireDate' => '2022-12-08'
        ]);
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med7',
            'Med_name' => 'Bitter melon',
            'unitprice' => '40',
            'stock_qty' => '100',
            
            'Wlimit'=>'40',
            'manufactureDate' => '2020-04-08',
            'expireDate' => '2023-04-08'
        ]);
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med8',
            'Med_name' => 'Cardamom',
            'unitprice' => '40',
            'stock_qty' => '210',
          
            'Wlimit'=>'80',
            'manufactureDate' => '2020-04-08',
            'expireDate' => '2022-04-08'
        ]);



       //Online booking
        DB::table('online_bookings')->insert([
            'App_id'=> 'ob1',
            'Doc_id' => 'doc1',
            'Pat_id' => 'pat1',
            'availableDate' => '2021-02-04',
            'availableTime' => '08:00:00'
        ]);
        DB::table('online_bookings')->insert([

            
            'App_id'=> 'ob2',
            'Doc_id' => 'doc1',
            'Pat_id' => 'pat2',
            'availableDate' => '2021-01-04',
            'availableTime' => '08:00:00'
        ]);
        DB::table('online_bookings')->insert([
            'App_id'=> 'ob3',
            'Doc_id' => 'doc1',
            'Pat_id' => 'pat3',
            'availableDate' => '2021-05-04',
            'availableTime' => '08:00:00'
        ]);
        DB::table('online_bookings')->insert([
            'App_id'=> 'ob4',
            'Doc_id' => 'doc2',
            'Pat_id' => 'pat4',
            'availableDate' => '2021-04-04',
            'availableTime' => '08:00:00'
        ]);
        DB::table('online_bookings')->insert([
            'App_id'=> 'ob5',
            'Doc_id' => 'doc2',
            'Pat_id' => 'pat5',
            'availableDate' => '2021-03-04',
            'availableTime' => '08:00:00'
        ]);

        //state symptomps1
        DB::table('add_symptomps')->insert([

            'Doc_id' => 'doc1',
            'Pat_id' => 'pat1',
            'text' => 'Skin rash',
            'img' => 'skin_rash.jpg',
            'date' => '2020-05-04',
            'time' => '08:00:00',
            'created_at' => '2020-05-04 08:00:00'

        ]);
        DB::table('add_symptomps')->insert([

            'Doc_id' => 'doc1',
            'Pat_id' => 'pat1',
            'text' => 'Feeling sick',
            'date' => '2020-09-04',
            'time' => '08:30:00',
            'created_at' => '2020-09-04 08:30:00'
        ]);
        DB::table('add_symptomps')->insert([

            'Doc_id' => 'doc1',
            'Pat_id' => 'pat1',
            'text' => 'Feeling sick',
            'date' => '2020-05-04',
            'time' => '08:00:00',
            'created_at' => '2020-05-04 08:00:00'
        ]);
        DB::table('add_symptomps')->insert([

            'Doc_id' => 'doc1',
            'Pat_id' => 'pat1',
            'text' => 'Feeling sick',
            'date' => '2020-11-04',
            'time' => '12:00:00',
            'created_at' => '2020-11-04 12:00:00'
        ]);
        DB::table('add_symptomps')->insert([

            'Doc_id' => 'doc1',
            'Pat_id' => 'pat1',
            'text' => 'Continousely Vomiting',
            'date' => '2020-12-04',
            'time' => '04:00:00',
            'created_at' => '2020-12-04 04:00:00'
        ]);


        ///admin

        DB::table('all_users')->insert([
            'id'=>'admin',
            'password'=>'admin',
            'roll'=>'admin'
        ]);
        
      

    }
}
