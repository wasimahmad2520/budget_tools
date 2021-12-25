<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GoalTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       if (\DB::table('goal_types')->count() > 0) {
            return;
        }

      \DB::table('goal_types')->insert([
            ['goal_name' =>'Goal'],
            ['goal_name' =>'Objective'],
            ['goal_name' =>'Obligation'],
           
               ]);
    }
}
