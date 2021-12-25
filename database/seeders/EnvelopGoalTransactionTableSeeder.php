<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EnvelopGoalTransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       if (\DB::table('goal_transactions')->count() > 0) {
            return;
        }
     for($i=1;$i<5;$i++){
          \DB::table('goal_transactions')->insert([

            ['user_id'=>$i,'budget_id'=>$i,'total_amount' =>'100000','envelop_id' =>$i,'goal_id' =>$i,'is_from_envelop_to_goal' =>1],
            ['user_id'=>$i,'budget_id'=>$i,'total_amount' =>'50000','envelop_id' =>$i,'goal_id' =>$i,'is_from_envelop_to_goal' =>1],
            ['user_id'=>$i,'budget_id'=>$i,'total_amount' =>'100000','envelop_id' =>$i,'goal_id' =>$i,'is_from_envelop_to_goal' =>2],
            ['user_id'=>$i,'budget_id'=>$i,'total_amount' =>'500000','envelop_id' =>$i,'goal_id' =>$i,'is_from_envelop_to_goal' =>2],
          
          
               ]);    
               }
    }
}
