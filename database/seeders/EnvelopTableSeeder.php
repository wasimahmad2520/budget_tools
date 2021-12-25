<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EnvelopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\DB::table('envelops')->count() > 0) {
            return;
        }

      \DB::table('envelops')->insert([
            ['budget_id'=>'1','user_id'=>'1','name' =>'Monthly Expenses'],
            ['budget_id'=>'1','user_id'=>'1','name' =>'Frequent Expenses'],
            ['budget_id'=>'1','user_id'=>'1','name' =>'Giving'],
            ['budget_id'=>'1','user_id'=>'1','name' =>'Short Term Saving'],
               ]);

      \DB::table('envelops')->insert([
            ['budget_id'=>'2','user_id'=>'2','name' =>'Monthly Expenses'],
            ['budget_id'=>'2','user_id'=>'2','name' =>'Frequent Expenses'],
            ['budget_id'=>'2','user_id'=>'2','name' =>'Giving'],
            ['budget_id'=>'2','user_id'=>'2','name' =>'Short Term Saving'],
               ]);

      \DB::table('envelops')->insert([
            ['budget_id'=>'3','user_id'=>'3','name' =>'Monthly Expenses'],
            ['budget_id'=>'3','user_id'=>'3','name' =>'Frequent Expenses'],
            ['budget_id'=>'3','user_id'=>'3','name' =>'Giving'],
            ['budget_id'=>'3','user_id'=>'3','name' =>'Short Term Saving'],
               ]);

      \DB::table('envelops')->insert([
            ['budget_id'=>'4','user_id'=>'4','name' =>'Monthly Expenses'],
            ['budget_id'=>'4','user_id'=>'4','name' =>'Frequent Expenses'],
            ['budget_id'=>'4','user_id'=>'4','name' =>'Giving'],
            ['budget_id'=>'4','user_id'=>'4','name' =>'Short Term Saving'],
               ]);
    }
}
