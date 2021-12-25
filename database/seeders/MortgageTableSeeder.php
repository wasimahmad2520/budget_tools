<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MortgageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
         if (\DB::table('mortgages')->count() > 0) {
            return;
        }
         for($i=1;$i<5;$i++){
          \DB::table('mortgages')->insert([

            ['user_id' =>$i,'mortgage_name'=>"May Be get Used",'amount'=>10000000,'start_date'=>'2021-10-01','end_date'=>'2021-11-01','mortgage_status'=>1],
            ['user_id' =>$i,'mortgage_name'=>"Important For me",'amount'=>5000000,'start_date'=>'2021-10-01','end_date'=>'2021-12-01','mortgage_status'=>1],
            ['user_id' =>$i,'mortgage_name'=>"Awesome",'amount'=>30000,'start_date'=>'2021-10-01','end_date'=>'2021-12-01','mortgage_status'=>2],
            ['user_id' =>$i,'mortgage_name'=>"Wow !!",'amount'=>30000000,'start_date'=>'2021-10-01','end_date'=>'2021-12-01','mortgage_status'=>2],
            ['user_id' =>$i,'mortgage_name'=>"Characters",'amount'=>1000,'start_date'=>'2021-10-01','end_date'=>'2021-12-01','mortgage_status'=>3],
            ['user_id' =>$i,'mortgage_name'=>"Honesty",'amount'=>1000,'start_date'=>'2021-10-01','end_date'=>'2021-12-01','mortgage_status'=>3],
        
                                     ]);  
         }
    }
}
