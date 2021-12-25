<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
         if (\DB::table('banks')->count() > 0) {
            return;
        }
        
          \DB::table('banks')->insert([
            ['bank_name' =>"American Express",'swift_code'=>'AE #AME545454','code'=>"#bank_other_code"],
            ['bank_name' =>"Chase Bank",'swift_code'=>'CE #CE545454','code'=>"#bank_other_code"],
            ['bank_name' =>"Bank Of America",'swift_code'=>'BA #BE545454','code'=>"#bank_other_code"],
            ['bank_name' =>"National Bank",'swift_code'=>'NB #NB545454','code'=>"#bank_other_code"],
                                      
                                     ]);  

      
    }
}
