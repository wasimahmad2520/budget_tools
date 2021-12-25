<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EnvelopSubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\DB::table('envelop_sub_categories')->count() > 0) {
            return;
        }


    // first user different expenses schedule
        $userID=1; $envelopID=1;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Housing','total_budget'=>3000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Car','total_budget'=>7000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Issurance','total_budget'=>9000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Cell Phone','total_budget'=>11000],
                                                   ]);
     $envelopID=2;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Home Owner Issurance','total_budget'=>1000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Clothing','total_budget'=>2000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Deodorant','total_budget'=>1000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Medical Bill','total_budget'=>3000],
                                                   ]);
    $envelopID=3;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Birth\'s Day','total_budget'=>800],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Mother\'s Day','total_budget'=>5000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Father\'s Day ' ,'total_budget'=>5000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Valintine\'s Day','total_budget'=>50],
                                                   ]);

      $envelopID=4;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Appliance','total_budget'=>300],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Furniture','total_budget'=>50000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Large Tools ' ,'total_budget'=>80000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Fishing Gear','total_budget'=>100],
           
                                                     ]);

    // Second  user different expenses schedule
        $userID=2; $envelopID=5;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Housing','total_budget'=>3000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Car','total_budget'=>7000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Issurance','total_budget'=>9000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Cell Phone','total_budget'=>11000],
                                                   ]);
     $envelopID=6;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Home Owner Issurance','total_budget'=>1000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Clothing','total_budget'=>2000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Deodorant','total_budget'=>1000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Medical Bill','total_budget'=>3000],
                                                   ]);
      $envelopID=7;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Birth\'s Day','total_budget'=>800],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Mother\'s Day','total_budget'=>5000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Father\'s Day ' ,'total_budget'=>5000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Valintine\'s Day','total_budget'=>50],
                                                   ]);

       $envelopID=8;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Appliance','total_budget'=>300],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Furniture','total_budget'=>50000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Large Tools ' ,'total_budget'=>80000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Fishing Gear','total_budget'=>100],
           
                                                  ]);



    // Third  user different expenses schedule
        $userID=3; $envelopID=9;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Housing','total_budget'=>3000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Car','total_budget'=>7000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Issurance','total_budget'=>9000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Cell Phone','total_budget'=>11000],
                                                   ]);
     $envelopID=10;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Home Owner Issurance','total_budget'=>1000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Clothing','total_budget'=>2000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Deodorant','total_budget'=>1000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Medical Bill','total_budget'=>3000],
                                                   ]);
      $envelopID=11;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Birth\'s Day','total_budget'=>800],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Mother\'s Day','total_budget'=>5000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Father\'s Day ' ,'total_budget'=>5000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Valintine\'s Day','total_budget'=>50],
                                                   ]);

      $envelopID=12;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Appliance','total_budget'=>300],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Furniture','total_budget'=>50000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Large Tools ' ,'total_budget'=>80000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Fishing Gear','total_budget'=>100],
           
                                                   ]);


    // Fourth  user different expenses schedule
        $userID=4; $envelopID=13;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Housing','total_budget'=>3000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Car','total_budget'=>7000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Issurance','total_budget'=>9000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Cell Phone','total_budget'=>11000],
                                                   ]);
      $envelopID=14;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Home Owner Issurance','total_budget'=>1000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Clothing','total_budget'=>2000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Deodorant','total_budget'=>1000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Medical Bill','total_budget'=>3000],
                                                   ]);
      $envelopID=15;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Birth\'s Day','total_budget'=>800],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Mother\'s Day','total_budget'=>5000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Father\'s Day ' ,'total_budget'=>5000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Valintine\'s Day','total_budget'=>50],
                                                   ]);

     $envelopID=16;
      \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Appliance','total_budget'=>300],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Furniture','total_budget'=>50000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Large Tools ' ,'total_budget'=>80000],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Fishing Gear','total_budget'=>100],
           
                                                   ]);


     
    }
}
