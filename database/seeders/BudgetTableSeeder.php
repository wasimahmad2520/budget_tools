<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BudgetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         if (\DB::table('budgets')->count() > 0) {
            return;
        }
        $userID=1;$currencyID=97;$numberFormatID=1;$dateFormatID=1;$accountID=1;

             \DB::table('budgets')->insert([
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"Assets Budget"],
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"IT Budget"],
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"Tour Budget"],
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"Mates Budget"],
               ]);

              $userID=2;$accountID=5;
             \DB::table('budgets')->insert([
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"Assets Budget"],
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"IT Budget"],
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"Tour Budget"],
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"Mates Budget"],
               ]);

              $userID=3;$accountID=9;
             \DB::table('budgets')->insert([
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"Assets Budget"],
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"IT Budget"],
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"Tour Budget"],
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"Mates Budget"],
               ]);
             
              $userID=4;$accountID=13;
             \DB::table('budgets')->insert([
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"Assets Budget"],
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"IT Budget"],
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"Tour Budget"],
            ['user_id' =>$userID,'currency_id'=>$currencyID,'date_format_id'=>$dateFormatID,'number_format_id'=>$numberFormatID,'budget_name'=>"Mates Budget"],
               ]);
     


            // ['user_id' =>$i,'currency_id'=>$currencyID,'number_format_id'=>$numberFormatID,'budget_name'=>"Excersize Budget"],
            // ['user_id' =>$i,'currency_id'=>$currencyID,'number_format_id'=>$numberFormatID,'budget_name'=>"Health Budget"],
            // ['user_id' =>$i,'currency_id'=>$currencyID,'number_format_id'=>$numberFormatID,'budget_name'=>"Repairing Budget"],
            // ['user_id' =>$i,'currency_id'=>$currencyID,'number_format_id'=>$numberFormatID,'budget_name'=>"Annual Budget"],
    }
}
