<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AccountTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       if (\DB::table('account_types')->count() > 0) {
            return;
        }

for($i=1;$i<5;$i++){
   \DB::table('account_types')->insert([
            ['user_id'=>$i,'accoutn_type_name' =>'Savings'],
            ['user_id'=>$i,'accoutn_type_name' =>'Freelancing Account'],
            ['user_id'=>$i,'accoutn_type_name' =>'Line Of Credit'],
            ['user_id'=>$i,'accoutn_type_name' =>'HELOC Account'],
               ]);    
}
   
    }
}
