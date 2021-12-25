<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PayeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\DB::table('payees')->count() > 0) {
            return;
        }

    for($i=1;$i<5;$i++){

          \DB::table('payees')->insert([
            ["user_id"=>$i,'payee_name' =>"Rent"],
            ["user_id"=>$i,'payee_name' =>"Fuel"],
            ["user_id"=>$i,'payee_name' =>"Fun"],
            ["user_id"=>$i,'payee_name' =>"Gas"],
            ["user_id"=>$i,'payee_name' =>"Costmatics"],
                                     ]); 
                       }
        
       
    }
}
