<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('doc1@'),
            'roll' => 'doctor'
        ]);
        DB::table('doctors')->insert([
            'Doc_id' => 'doc1',
            'Doc_name' => 'Elakshana',
            'Doc_email' => 'elakshana@gmail.com',
            'Doc_addr' => '115, Umamill road, Kommathurai, Chenkalady',
            'Doc_pNum' => '0764961736',
            'Doc_im' => '',
            'password' => Hash::make('doc1@')
        ]);
        DB::table('all_users')->insert([
            'id'=> 'doc2',
            'password' => Hash::make('doc2@'),
            'roll' => 'doctor'
        ]);
        DB::table('doctors')->insert([
            'Doc_id' => 'doc2',
            'Doc_name' => 'M Rashel',
            'Doc_email' => 'rashel2@gmail.com',
            'Doc_addr' => 'No.2,vegas road,Anuradhapura',
            'Doc_pNum' => '0771242678',
            'Doc_im' => '',
            'password' => Hash::make('doc2@')
        ]);
     

        // producer sample data
        DB::table('all_users')->insert([
            'id'=> 'prod1',
            'password' => Hash::make('prod1@'),
            'roll' => 'producer'
        ]);
        DB::table('medicine_producers')->insert([
            'Pro_id' => 'prod1',
            'Pro_name' => 'Nishantha Herath',
            'Pro_addr' => 'No.34, stage 7, Negombo',
            'Pro_pNum' => '0716894567',
            'Pro_email'=>'anuavantha@gmail.com',
            'Pro_im' => '',
            'password' => Hash::make('prod1@')
        ]);

         DB::table('all_users')->insert([
            'id'=> 'prod2',
            'password' => Hash::make('prod2@'),
            'roll' => 'producer'
        ]);
        DB::table('medicine_producers')->insert([
            'Pro_id' => 'prod2',
            'Pro_name' => 'Raju Gandhi',
            'Pro_addr' => '45,Navalar road, Jaffna',
            'Pro_pNum' => '0784574523',
            'Pro_email'=>'raju8525@gmail.com',
            'Pro_im' => '',
            'password' => Hash::make('prod2@')
        ]);
        
        //patient sample data
        DB::table('all_users')->insert([
            'id'=> 'pat1',
            'password' => Hash::make('pat1@'),
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat1',
            'Pat_name' => 'Afrid',
            'Pat_email' => 'mafrid029@gmail.com',
            'Pat_addr' => '98,KKP Road, Kalmunai 03.',
            'Pat_pNum' => '0778565256',
            'Pimage' => '',
            'dob' => '1997-05-24',
            'gender' => 'male',
            'guardian' => 'Subair',
            'password' => Hash::make('pat1@')
        ]);

        DB::table('all_users')->insert([
            'id'=> 'pat2',
            'password' => Hash::make('pat2@'),
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat2',
            'Pat_name' => 'Kogul K',
            'Pat_email' => 'kogulkarthikesu@gmail.com',
            'Pat_addr' => '85,Navalar road, Central camp, Savalakkadai',
            'Pat_pNum' => '0754585654',
            'Pimage' => '',
            'dob' => '1997-06-12',
            'gender' => 'male',
            'guardian' => 'Karthikesu',
            'password' => Hash::make('pat2@')
        ]);

        DB::table('all_users')->insert([
            'id'=> 'pat3',
            'password' => Hash::make('pat3@'),
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat3',
            'Pat_name' => 'Nathali Dias',
            'Pat_email' => 'nathali@gmail.com',
            'Pat_addr' => 'No.13, N5 road, Ampara',
            'Pat_pNum' => '0716789023',
            'Pimage' => '',
            'dob' => '1987-01-12',
            'gender' => 'female',
            'guardian' => 'Danushka Dias',
            'password' => Hash::make('pat3@')
        ]);
        //pat4
        DB::table('all_users')->insert([
            'id'=> 'pat4',
            'password' => Hash::make('pat4@'),
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat4',
            'Pat_name' => 'Pithuja Sritharan',
            'Pat_email' => 'PithujaS@gmail.com',
            'Pat_addr' => 'No.3, ABC road, Batticaloa',
            'Pat_pNum' => '0711212023',
            'Pimage' => '',
            'dob' => '1999-05-31',
            'gender' => 'female',
            'guardian' => 'kamala Sritharan',
            'password' => Hash::make('pat4@')
        ]);
        //pat5
        DB::table('all_users')->insert([
            'id'=> 'pat5',
            'password' => Hash::make('pat5@'),
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat5',
            'Pat_name' => 'Vincent Jackshan',
            'Pat_email' => 'Vincent@gmail.com',
            'Pat_addr' => 'No.13, BB road, Ampara',
            'Pat_pNum' => '0716789023',
            'Pimage' => '',
            'dob' => '1992-02-01',
            'gender' => 'female',
            'guardian' => 'Priya Jackshan',
            'password' => Hash::make('pat5@')
        ]);
        //pat6
        DB::table('all_users')->insert([
            'id'=> 'pat6',
            'password' => Hash::make('pat6@'),
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat6',
            'Pat_name' => 'Maaran Suresh',
            'Pat_email' => 'Sureshss@gmail.com',
            'Pat_addr' => 'No.2, Valluvan road, Ampara',
            'Pat_pNum' => '0716789023',
            'Pimage' => '',
             'dob' => '1989-11-20',
            'gender' => 'male',
            'guardian' => 'Ramesh Suresh',
            'password' => Hash::make('pat6@')
        ]);
        //pat7
        DB::table('all_users')->insert([
            'id'=> 'pat7',
            'password' => Hash::make('pat7@'),
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat7',
            'Pat_name' => 'Jenu Kirisanth',
            'Pat_email' => 'Kirisanth111@gmail.com',
            'Pat_addr' => 'No.13, Pannikar road, Ampara',
            'Pat_pNum' => '0776789122',
            'Pimage' => '',
             'dob' => '1998-12-22',
            'gender' => 'male',
            'guardian' => 'Bala Kirisanth',
            'password' => Hash::make('pat7@')
        ]);
        //pat8
        DB::table('all_users')->insert([
            'id'=> 'pat8',
            'password' => Hash::make('pat8@'),
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat8',
            'Pat_name' => 'Sarath Balu',
            'Pat_email' => 'BaluBalu12@gmail.com',
            'Pat_addr' => 'No.13, VSS road, Ampara',
            'Pat_pNum' => '0716712323',
            'Pimage' => '',
             'dob' => '1955-04-14',
            'gender' => 'male',
            'guardian' => 'Vishva Helan',
            'password' => Hash::make('pat8@')
        ]);
        //pat9
        DB::table('all_users')->insert([
            'id'=> 'pat9',
            'password' => Hash::make('pat9@'),
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat9',
            'Pat_name' => 'John Devid',
            'Pat_email' => 'DevidAR@gmail.com',
            'Pat_addr' => 'No.13, N5 road, Ampara',
            'Pat_pNum' => '0776781223',
            'Pimage' => '',
             'dob' => '1997-09-21',
            'gender' => 'male',
            'guardian' => 'Danush Devid',
            'password' => Hash::make('pat9@')
        ]);
        //pat10
        DB::table('all_users')->insert([
            'id'=> 'pat10',
            'password' => Hash::make('pat10@'),
            'roll' => 'patient'
        ]);
        DB::table('patients')->insert([
            'Pat_id' => 'pat10',
            'Pat_name' => 'Kajan Varan',
            'Pat_email' => 'Kajan@gmail.com',
            'Pat_addr' => 'No.1, KS road, Ampara',
            'Pat_pNum' => '0776789023',
            'Pimage' => '',
             'dob' => '2001-10-27',
            'gender' => 'male',
            'guardian' => 'Kamal Varan',
            'password' => Hash::make('pat10@')
        ]);
        //Pharmacist sample data
        DB::table('all_users')->insert([
            'id'=> 'pha1',
            'password' => Hash::make('pha1@'),
            'roll' => 'pharmacist'
        ]);
        DB::table('pharmacists')->insert([
            'Phar_id' => 'pha1',
            'Phar_name' => 'Dilki Hasara',
            'Phar_addr' => 'No.618/80 E, Buddhagaya mawatha, Anuradhapura',
            'Phar_pNum' => '0715397001',
            'Phar_email'=>'dhwways@gmail.com',
            'password' => Hash::make('pha1@')
        ]);

        DB::table('all_users')->insert([
            'id'=> 'pha2',
            'password' => Hash::make('pha2@'),
            'roll' => 'pharmacist'
        ]);
        DB::table('pharmacists')->insert([
            'Phar_id' => 'pha2',
            'Phar_name' => 'S.Lokavennilavan',
            'Phar_addr' => '14, Alli nagar road, Poonakari, Jaffna',
            'Phar_pNum' => '0778545789',
            'Phar_email'=>'lokavan007@gmail.com',
            'password' => Hash::make('pha2@')
        ]);

         ///admin

        DB::table('all_users')->insert([
            'id'=>'admin',
            'password'=>Hash::make('admin'),
            'roll'=>'admin'
        ]);
        DB::table('admins')->insert([
            'id'=>'admin',
            'username'=>'Vishva',
            'password'=>Hash::make('admin'),
            'phone'=>'0774585654',
            'email'=>'vishwasasanka@gmail.com',
            
        ]);
        
        
		
        //admitted patients details
        
        DB::table('add_pats')->insert([
            'id' => '01',
            'Pat_id' => 'pat1',
            'disease' => 'Skin rash',
            'ad_date' => '2021-05-31',
            'disch_date' => '2021-06-15',
            'Doc_id' => 'doc1',
            'bedno' => '01',
            'status'=>'Discharged'
        ]);
        DB::table('add_pats')->insert([
            'id' => '02',
            'Pat_id' => 'pat2',
            'disease' => 'Vericose',
            'ad_date' => '2021-06-14',
            'Doc_id' => 'doc1',
            'bedno' => '02',
            'status'=>'Admitted'
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

        //addmitted patients
        
        DB::table('add_pat_ups')->insert([
            'id' => '01',
            'Pat_id' => 'pat1',
            'Doc_id' => 'doc1',
            'medicines' => 'Aralu,Triphala',
            'date' => '2021-05-31',
            'created_at' => '2021-05-31 14:23:40',
            'condition' => 'Need further treatment'
        ]);
        DB::table('add_pat_ups')->insert([
            'id' => '02',
            'Pat_id' => 'pat1',
            'Doc_id' => 'doc1',
            'medicines' => 'Ashwagandha,Aralu',
            'date' => '2021-06-05',
            'created_at' => '2021-06-05 09:23:40',
            'condition' => 'Need good sleep'
        ]);
        DB::table('add_pat_ups')->insert([
            'id' => '03',
            'Pat_id' => 'pat2',
            'Doc_id' => 'doc1',
            'medicines' => 'Cumin',
            'date' => '2021-06-14',
            'created_at' => '2021-06-14 10:23:40',
            'condition' => 'Sugar level increased'
        ]);
        DB::table('add_pat_ups')->insert([
            'id' => '04',
            'Pat_id' => 'pat2',
            'Doc_id' => 'doc1',
            'medicines' => 'Ashwagandha,Cumin',
            'date' => '2021-06-18',
             'created_at' => '2021-06-18 11:05:40',
            'condition' => 'Sugar level is still increased'
        ]);
        //prescription

        DB::table('medical_histories')->insert([
            'Meeting_id' => 'Pres1',
            'Pat_id' => 'pat1',
            'Doc_id' => 'doc1',
            'diagnosis' => 'rash',
            'disease' => 'Skin rash',
            'date' => '2021-06-17',
            'created_at' => '2021-06-17 14:23:40',
            'medicine' => "['Ashwagandha,2,Boswellia,5']",
            'bill' => '310',
            'issued' => 'Issued'
        ]);
        DB::table('medical_histories')->insert([
            'Meeting_id' => 'Pres2',
            'Pat_id' => 'pat3',
            'Doc_id' => 'doc1',
            'diagnosis' => 'leg pain',
            'disease' => 'Vericose',
            'date' => '2021-06-17',
             'created_at' => '2021-06-17 14:35:40',
            'bill'=>'920',
            'medicine' => "['Ashwagandha,8,Cardamom,17']",
            'issued' => 'Not Issued'
        ]);
        DB::table('medical_histories')->insert([
            'Meeting_id' => 'Pres3',
            'Pat_id' => 'pat4',
            'Doc_id' => 'doc2',
            'diagnosis' => 'High blood suger',
            'disease' => 'Diabetic',
            'date' => '2021-03-15',
            'created_at' => '2021-03-15 14:23:40',
            'bill'=>'850',
            'medicine' => "['Cumin,10,Bitter melon,10']",
            'issued'=> 'Issued'
        ]);

        //Patient Order

        DB::table('pat_med_orderings')->insert([
            'PatMedOrder_id'=>'Ord1',
            'Pat_id'=>'pat1',
            'bill'=>'860',
            'medicines' =>"['Ashwagandha,10,Bitter melon,14']",
            'PatMedOrder_date' => '2021-04-15',
            'status'=> 'Issued'
        ]);
        DB::table('pat_med_orderings')->insert([
            'PatMedOrder_id'=>'Ord2',
            'Pat_id'=>'pat1',
            'bill'=>'900',
            'medicines' =>"['Licorice,10,Bitter melon,14']",
            'PatMedOrder_date' => '2021-06-16',
             'status'=> 'Not Issued'
        ]);
        DB::table('pat_med_orderings')->insert([
            'PatMedOrder_id'=>'Ord3',
            'Pat_id'=>'pat8',
            'bill'=>'860',
            'medicines' =>"['Ashwagandha,10,Cardamom,14']",
            'PatMedOrder_date' => '2021-06-17',
            'status'=> 'Not Issued'
        ]);
        DB::table('pat_med_orderings')->insert([
            'PatMedOrder_id'=>'Ord4',
            'Pat_id'=>'pat5',
            'bill'=>'1280',
            'medicines' =>"['Ashwagandha,10,Cumin,14,Cardamom,14']",
            'PatMedOrder_date' => '2021-05-15',
            'status'=> 'Issued'
        ]);

        //maintain medicine stock
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med1',
            'Med_name' => 'Ashwagandha',
            'unitprice' => '30',
            'stock_qty' => '400',
             'description' => 'Ashwagandha is an Ayurvedic spice that may help your body manage stress more effectively. It may also lower your blood sugar levels and improve sleep, memory, muscle growth, and male fertility.',
            'Wlimit'=>'50',
            'orders'=>40,
            'manufactureDate' => '2021-04-02',
            'expireDate' => '2021-10-02'
        ]);
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med2',
            'Med_name' => 'Boswellia',
            'unitprice' => '50',
            'stock_qty' => '250',
           'description' => 'Boswellia is an Ayurvedic spice with anti-inflammatory properties. It may reduce joint pain, enhance oral health, and improve digestion, as well as increase breathing capacity in people with chronic asthma.',
            'orders'=>5,
            'Wlimit'=>'75',
            'manufactureDate' => '2021-04-02',
            'expireDate' => '2021-06-22'
        ]);
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med3',
            'Med_name' => 'Brahmi',
            'unitprice' => '90',
            'stock_qty' => '90',
           'description' => 'Brahmi is an Ayurvedic herb believed to lower inflammation, improve brain function, and reduce symptoms of ADHD. It may also increase your body’s ability to deal with stress, though more research is needed.',
            
            'Wlimit'=>'100',
            'manufactureDate' => '2021-04-08',
            'expireDate' => '2021-08-08'
        ]);
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med4',
            'Med_name' => 'Cumin',
            'unitprice' => '45',
            'stock_qty' => '120',
            'description' => 'Cumin is an Ayurvedic spice commonly used to add flavor to meals. It may decrease symptoms of IBS, improve risk factors for type 2 diabetes and heart disease, and perhaps even offer some protection against foodborne infection.',
            'orders'=>24,
            'Wlimit'=>'50',
            'manufactureDate' => '2021-04-08',
            'expireDate' => '2021-04-08'
        ]);
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med5',
            'Med_name' => 'Turmeric',
            'unitprice' => '100',
            'stock_qty' => '450',
           'description' => 'Turmeric is the Ayurvedic spice that gives curry its yellow color. Curcumin, its main compound, may help reduce inflammation and improve heart and brain health. However, large amounts are likely needed to attain these benefits.',
            
            'Wlimit'=>'100',
            'manufactureDate' => '2021-03-08',
            'expireDate' => '2021-12-08'
        ]);
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med6',
            'Med_name' => 'Licorice root',
            'unitprice' => '80',
            'stock_qty' => '90',
       'description' => 'Licorice root, which is considered one of the worlds oldest herbal remedies, comes from the root of the licorice plant (Glycyrrhiza glabra) ( 1 ). Native to Western Asia and Southern Europe, licorice has long been used to treat various ailments and flavor candies, drinks, and medicines',
            'orders'=>10,
            'Wlimit'=>'50',
            'manufactureDate' => '2021-04-08',
            'expireDate' => '2022-12-08'
        ]);
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med7',
            'Med_name' => 'Bitter melon',
            'unitprice' => '40',
            'stock_qty' => '110',
            'description' => 'Bitter melon is an Ayurvedic spice that may help lower blood sugar levels and boost insulin secretion. It may also reduce LDL (bad) cholesterol levels, though more research is needed before strong conclusions can be made.',
            'orders'=>38,
            'Wlimit'=>'40',
            'manufactureDate' => '2021-01-08',
            'expireDate' => '2023-04-08'
        ]);
        DB::table('medicine_stocks')->insert([
            'Med_id' => 'med8',
            'Med_name' => 'Cardamom',
            'unitprice' => '40',
            'stock_qty' => '200',
          'description' => 'Cardamom is an Ayurvedic spice that may lower blood pressure, improve breathing, and potentially help stomach ulcers heal. However, more research is necessary.',
            'orders'=>45,
            'Wlimit'=>'80',
            'manufactureDate' => '2021-04-08',
            'expireDate' => '2022-04-08'
        ]);

        //Available Time

        DB::table('doc_available_times')->insert([
            'id'=> '01',
            'Doc_id' => 'doc1',
            'availableDate' => '2021-06-18',
            'availableTime' => '15:00:00'
        ]);
        DB::table('doc_available_times')->insert([
            'id'=> '02',
            'Doc_id' => 'doc1',
            'availableDate' => '2021-06-26',
            'availableTime' => '15:00:00'
        ]);
        DB::table('doc_available_times')->insert([
            'id'=> '03',
            'Doc_id' => 'doc1',
            'availableDate' => '2021-07-03',
            'availableTime' => '15:00:00'
        ]);
         DB::table('doc_available_times')->insert([
            'id'=> '04',
            'Doc_id' => 'doc2',
            'availableDate' => '2021-06-28',
            'availableTime' => '17:00:00'
        ]);

        
       //Online booking
        DB::table('online_bookings')->insert([
            'App_id'=> 'App1',
            'Doc_id' => 'doc1',
            'Pat_id' => 'pat1',
            'availableDate' => '2021-06-17',
            'availableTime' => '15:00:00'
        ]);
        DB::table('online_bookings')->insert([
            'App_id'=> 'App2',
            'Doc_id' => 'doc1',
            'Pat_id' => 'pat2',
            'availableDate' => '2021-06-26',
            'availableTime' => '15:00:00'
        ]);
        DB::table('online_bookings')->insert([
            'App_id'=> 'App3',
            'Doc_id' => 'doc2',
            'Pat_id' => 'pat1',
            'availableDate' => '2021-06-28',
            'availableTime' => '17:00:00'
        ]);
       

        //state symptomps1
        DB::table('add_symptomps')->insert([

            'Doc_id' => 'doc1',
            'Pat_id' => 'pat1',
            'text' => 'Skin rash',
            'reply'=> 'Use cream continuously',
            'date' => '2021-05-04',
            'time' => '08:00:00',
            'created_at' => '2020-05-04 08:00:00'

        ]);
        DB::table('add_symptomps')->insert([

            'Doc_id' => 'doc1',
            'Pat_id' => 'pat1',
            'text' => 'Feeling sick',
            'date' => '2021-06-17',
            'time' => '08:30:00',
            'created_at' => '2020-09-04 08:30:00'
        ]);
        

        //supplier
        DB::table('all_users')->insert([
            'id'=> 'sup1',
            'password' => Hash::make('sup1@'),
            'roll' => 'supplier'
        ]);
        DB::table('ingredient_suppliers')->insert([
            'Sup_id' => 'sup1',
            'Sup_name' => 'Sanath Geegana',
            'Sup_addr' => 'No. 123, ABC road, Rabukkana',
            'Sup_pNum' => '0716720783',
            'Sup_email'=>'Sanathg@gmail.com',
            'Sup_im' => '',
            'password' => Hash::make('sup1@')
        ]);

        DB::table('all_users')->insert([
            'id'=> 'sup2',
            'password' => Hash::make('sup2@'),
            'roll' => 'supplier'
        ]);
        DB::table('ingredient_suppliers')->insert([
            'Sup_id' => 'sup2',
            'Sup_name' => 'Yogarajan Danesh',
            'Sup_addr' => 'No. 13, QOP road, Jaffna',
            'Sup_pNum' => '0782349345',
            'Sup_email'=>'danesh678@gmail.com',
            'Sup_im' => '',
            'password' => Hash::make('sup2@')
        ]);

        
        //ingredients

        DB::table('ingredients')->insert([
            'Ing_id' => '001',
            'Ing_name' => 'Aralu',
            'description' => 'Aralu uses in cough,asthma,vomitting,diarrhoea,epilepsy,melancholy,menorrhagia,dental diseases,bad body odour & anaroxia'
        ]);
        DB::table('ingredients')->insert([
            'Ing_id' => '002',
            'Ing_name' => 'Iguru',
            'description' => 'Iguru may help improve weight-related measurements. These include body weight and the waist-hip ratio.'
        ]);
        DB::table('ingredients')->insert([
            'Ing_id' => '003',
            'Ing_name' => 'Katuwal Batu',
            'description' => 'It is used as an expectorant, a treatment for cough, asthma, fever, heart diseases and many other conditions'
        ]);
        DB::table('ingredients')->insert([
            'Ing_id' => '004',
            'Ing_name' => 'Beli',
            'description' => 'Beli contains chemicals called tannins, flavonoids, and coumarins. These chemicals help to reduce swelling (inflammation). This might help treat asthma, diarrhea, and other conditions. Also, some of these chemicals help to reduce blood sugar.'
        ]);
        DB::table('ingredients')->insert([
            'Ing_id' => '005',
            'Ing_name' => 'Walmi',
            'description' => 'Walmi (Phaseolus adenanthus) 0r Wild liquorise is a common herb. The juice of the Welmi is given for sore throat, dry cough and urinary aliment. The juice is also a good blood purifier.'
        ]);
        DB::table('ingredients')->insert([
            'Ing_id' => '006',
            'Ing_name' => 'Wanaraja',
            'description' => 'use for snake bite poisonning'
        ]);
        DB::table('ingredients')->insert([
            'Ing_id' => '007',
            'Ing_name' => 'Komarika',
            'description' => 'use for gastritis, fevers, skin diseases, abdominal pains, burns'
        ]);
        DB::table('ingredients')->insert([
            'Ing_id' => '008',
            'Ing_name' => 'Rasakinda',
            'description' => 'The combination of Nelli and Rasakinda together effectively allay the numerous diseases, illnesses and discomforts of the body and helps maintain a healthy and balanced physic. Likewise it removes toxic free radicals generated by metabolism in cells and tissues, thereby cleaning the blood.'
        ]);
        DB::table('ingredients')->insert([
            'Ing_id' => '009',
            'Ing_name' => 'Sudu Hadun',
            'description' => 'Sudu handun oil has been used widely in aromatherapy and traditional massage oil. The essential oil facilitates to lessen anxiety and promotes a calming effect in individuals treated with aromatherapy massages. In addition, massaging the essential oil also enhances the skin glow and makes the skin look supple.'
        ]);
        DB::table('ingredients')->insert([
            'Ing_id' => '10',
            'Ing_name' => 'Kalatiya',
            'description' => 'It use for pacifies pitta dosha, antidote'
        ]);

        //ingredient orderings
        DB::table('ingredient_orderings')->insert([
            'id' => '001',
            'Ingredients' => 'Aralu',
            'Pro_id' => 'prod1',
            'Sup_id' => 'sup1',
            'IngOrder_date' => '2021-04-06',
            'status' => 'Issued'
            
        ]);
        DB::table('ingredient_orderings')->insert([
            'id' => '002',
            'Ingredients' => 'Thippili',
            'Pro_id' => 'prod1',
            'Sup_id' => 'sup1',
            'IngOrder_date' => '2021-06-17',
            'status' => 'Not Issued'
        ]);
        DB::table('ingredient_orderings')->insert([
            'id' => '003',
            'Ingredients' => 'Rasakida',
            'Pro_id' => 'prod2',
            'Sup_id' => 'sup1',
            'IngOrder_date' => '2021-06-15',
            'status' => 'Issued'
        ]);
        DB::table('ingredient_orderings')->insert([
            'id' => '004',
            'Ingredients' => 'Walmi',
            'Pro_id' => 'prod1',
            'Sup_id' => 'sup2',
            'IngOrder_date' => '2021-05-01',
            'status' => 'Issued'
        ]);
        DB::table('ingredient_orderings')->insert([
            'id' => '005',
            'Ingredients' => 'Lunuvila',
            'Pro_id' => 'prod1',
            'Sup_id' => 'sup2',
            'IngOrder_date' => '2021-06-17',
            'status' => 'Not Issued'
        ]);
        DB::table('ingredient_orderings')->insert([
            'id' => '006',
            'Ingredients' => 'Daththa',
            'Pro_id' => 'prod1',
            'Sup_id' => 'sup1',
            'IngOrder_date' => '2021-05-06',
            'status' => 'Issued'
        ]);

        //ingriedient stock

        DB::table('ingredient_stocks')->insert([
            'id' => '01',
            'Pro_id' => 'prod1',
            'Ing_id' => '001',
            'Ing_name' => 'Aralu',
            'Ing_qty' => '200'
        ]);
        DB::table('ingredient_stocks')->insert([
            'id' => '02',
            'Pro_id' => 'prod1',
            'Ing_id' => '002',
            'Ing_name' => 'Iguru',
            'Ing_qty' => '500'
        ]);
        DB::table('ingredient_stocks')->insert([
            'id' => '03',
            'Pro_id' => 'prod1',
            'Ing_id' => '003',
            'Ing_name' => 'Katuwal Batu',
            'Ing_qty' => '300'
        ]);
        DB::table('ingredient_stocks')->insert([
            'id' => '04',
            'Pro_id' => 'prod1',
            'Ing_id' => '004',
            'Ing_name' => 'Beli',
            'Ing_qty' => '200'
        ]);
        DB::table('ingredient_stocks')->insert([
            'id' => '05',
            'Pro_id' => 'prod1',
            'Ing_id' => '005',
            'Ing_name' => 'Walmi',
            'Ing_qty' => '200'
        ]);

        ///Order from pharmacist
         DB::table('medicine_orderings')->insert([
            'MedOrder_id' => 'M_Ord302',
            'medicines' => "['Cumin,350']",
            'Pro_id'=>'prod1',
            'Phar_id'=>'pha1',
            'MedOrder_date'=> '2021-06-14',
            'status'=>'Not Issued',
            'created_at'=>'2021-06-14 10:05:54'
        ]);

        DB::table('medicine_orderings')->insert([
            'MedOrder_id' => 'M_Ord242',
            'medicines' => "['Brahmi,300']",
            'Pro_id'=>'prod1',
            'Phar_id'=>'pha1',
            'MedOrder_date'=> '2021-06-14',
            'status'=>'Not Issued',
            'created_at'=>'2021-06-14 10:05:54'
        ]);
        DB::table('medicine_orderings')->insert([
            'MedOrder_id' => 'M_Ord145',
            'medicines' => "['Ashwagandha,250']",
            'Pro_id'=>'prod1',
            'Phar_id'=>'pha1',
            'MedOrder_date'=> '2021-02-01',
            'status'=>'Issued',
            'created_at'=>'2021-02-01 11:05:54'
        ]);
        //producer Medicine table

        DB::table('new_med_stocks')->insert([
            'id'=>'001',
            'Pro_id'=>'prod1',
            'Med_id'=>'med1',
            'Med_name'=>'Ashwagandha',
            'unitprice'=> 25,
            'stock_qty'=> 500,
            'description'=>'Ashwagandha is an Ayurvedic spice that may help your body manage stress more effectively. It may also lower your blood sugar levels and improve sleep, memory, muscle growth, and male fertility.',
            'manufactureDate'=>'2021-06-15',
            'expireDate'=>'2021-07-15',
            'created_at'=>'2021-06-15 17:45:14'
        ]);
        DB::table('new_med_stocks')->insert([
            'id'=>'002',
            'Pro_id'=>'prod2',
            'Med_id'=>'med10',
            'Med_name'=>'Licorice root',
            'unitprice'=> 16,
            'stock_qty'=> 400,
            'description'=>'Licorice root, which is considered one of the worlds oldest herbal remedies, comes from the root of the licorice plant (Glycyrrhiza glabra) ( 1 ). Native to Western Asia and Southern Europe, licorice has long been used to treat various ailments and flavor candies, drinks, and medicines',
            'manufactureDate'=>'2021-05-15',
            'expireDate'=>'2021-07-30',
            'created_at'=>'2021-05-15 15:45:14'
        ]);
        DB::table('new_med_stocks')->insert([
            'id'=>'003',
            'Pro_id'=>'prod1',
            'Med_id'=>'med3',
            'Med_name'=>'Brahmi',
            'unitprice'=> 85,
            'stock_qty'=> 320,
            'description'=>'Brahmi is an Ayurvedic herb believed to lower inflammation, improve brain function, and reduce symptoms of ADHD. It may also increase your body’s ability to deal with stress, though more research is needed.',
            'manufactureDate'=>'2021-06-10',
            'expireDate'=>'2021-07-15',
            'created_at'=>'2021-06-10 17:45:14'
        ]);
        DB::table('new_med_stocks')->insert([
            'id'=>'004',
            'Pro_id'=>'prod1',
            'Med_id'=>'med4',
            'Med_name'=>'Cumin',
            'unitprice'=> 50,
            'stock_qty'=> 700,
            'description'=>'Cumin is an Ayurvedic spice commonly used to add flavor to meals. It may decrease symptoms of IBS, improve risk factors for type 2 diabetes and heart disease, and perhaps even offer some protection against foodborne infection.',
            'manufactureDate'=>'2021-05-31',
            'expireDate'=>'2021-07-01',
            'created_at'=>'2021-05-31 09:45:14'
        ]);

       
        

}
}
