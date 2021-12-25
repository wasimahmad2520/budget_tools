<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EnvelopGoalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         if (\DB::table('envelop_goals')->count() > 0) {
            return;
        }

       // first user different goals
        $userID=1; $envelopSubCategoryID=1;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-10-01'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-10-01'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-10-01'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-10-01'],
                                                   ]);
     
           $envelopSubCategoryID=5;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-10-15'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-10-15'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-10-15'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-10-15'],
                                                   ]);
  
          $envelopSubCategoryID=9;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-11-08'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-11-08'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-11-08'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-11-08'],
                                                   ]);

          $envelopSubCategoryID=13;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-11-10'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-11-10'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-11-10'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-11-10'],
                                                   ]);






       // Second user different goals
        $userID=2; $envelopSubCategoryID=17;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-10-01'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-10-01'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-10-01'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-10-01'],
                                                   ]);
     
           $envelopSubCategoryID=21;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-10-15'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-10-15'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-10-15'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-10-15'],
                                                   ]);
  
          $envelopSubCategoryID=25;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-11-08'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-11-08'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-11-08'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-11-08'],
                                                   ]);

          $envelopSubCategoryID=29;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-11-10'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-11-10'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-11-10'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-11-10'],
                                                   ]);







       // Third user different goals
        $userID=3; $envelopSubCategoryID=33;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-10-01'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-10-01'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-10-01'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-10-01'],
                                                   ]);
     
           $envelopSubCategoryID=37;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-10-15'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-10-15'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-10-15'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-10-15'],
                                                   ]);
  
          $envelopSubCategoryID=41;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-11-08'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-11-08'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-11-08'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-11-08'],
                                                   ]);

          $envelopSubCategoryID=45;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-11-10'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-11-10'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-11-10'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-11-10'],
                                                   ]);








       // Third user different goals
        $userID=4; $envelopSubCategoryID=49;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-10-01'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-10-01'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-10-01'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-10-01'],
                                                   ]);
     
           $envelopSubCategoryID=53;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-10-15'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-10-15'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-10-15'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-10-15'],
                                                   ]);
  
          $envelopSubCategoryID=57;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-11-08'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-11-08'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-11-08'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-11-08'],
                                                   ]);

          $envelopSubCategoryID=61;
      \DB::table('envelop_goals')->insert([
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID,'duration_type' =>'weekly','total_amount'=>3000,'transaction_date'=>'2021-11-10'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+1,'duration_type' =>'monthly','total_amount'=>7000,'transaction_date'=>'2021-11-10'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+2,'duration_type' =>'by_date','total_amount'=>9000,'transaction_date'=>'2021-11-10'],
            ['user_id'=>$userID,'envelop_sub_category_id'=>$envelopSubCategoryID+3,'duration_type' =>'weekly','total_amount'=>11000,'transaction_date'=>'2021-11-10'],
                                                   ]);






















    }
}
