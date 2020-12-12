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
        
       
       
        DB::table('medical_histories')->insert([
            'Meeting_id' => 'App16',
            'Pat_id' => 'Pat1',
            'Doc_id' => 'doc1',
            'diagnosis' => 'An essay is generally a short piece of writing outlining the writer’s perspective or story. It is often considered synonymous with a story or a paper or an article. Essays can be formal as well as informal. Formal essays are generally academic in nature and tackle serious topics. We will be focusing on informal essays which are more personal and often have humorous elements.',
            'disease' => 'corona,hfghfg Dengue',
            'medicine' => 'Hot Water, fidsjhhfhghs kidfdsjfiodsjo idjf sdfiods dsifjdsi fiodsjfds fiodsjfi sdfiodsjfiosdfiods ufdsiofds iofsdif isdf usd '
            
        ]);

     
    }
}
