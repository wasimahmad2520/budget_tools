<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         if (\DB::table('accounts')->count() > 0) {
            return;
        }
        $budgetID=1;
         for($i=1;$i<5;$i++){

          \DB::table('accounts')->insert([
            ['user_id' =>$i,'budget_id'=>$budgetID,'account_type_id'=>1,'account_title'=>"Just For Fun",'current_amount'=>100000,'is_account_unlinked'=>1],
            ['user_id' =>$i,'budget_id'=>$budgetID+1,'account_type_id'=>1,'account_title'=>"Just a Demo",'current_amount'=>50000,'is_account_unlinked'=>1],
            ['user_id' =>$i,'budget_id'=>$budgetID+2,'account_type_id'=>1,'account_title'=>"Just a Practice",'current_amount'=>25000,'is_account_unlinked'=>1],
            ['user_id' =>$i,'budget_id'=>$budgetID+3,'account_type_id'=>1,'account_title'=>"Ohhh, Yeah !",'current_amount'=>25000,'is_account_unlinked'=>1],
                                     ]);  
          if($i==1){
             $budgetID=5;
          }else if($i==2){
            $budgetID=9;
          }else if($i==3){
           $budgetID=13;
         }
         

         }
        
    }
}
