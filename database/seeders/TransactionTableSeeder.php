<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       if (\DB::table('transactions')->count() > 0) {
            return;
        }

    $userID=1;$accountID=1;
   \DB::table('transactions')->insert([
            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>'0','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>'0','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>$accountID,'transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'5000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'5000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01']
    
               ]);    

$accountID=2;
  \DB::table('transactions')->insert([
            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>'0','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>'0','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>$accountID,'transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'5000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'5000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01']
    
               ]);  


// second user double entries



    $userID=2;$accountID=5;
   \DB::table('transactions')->insert([
            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>'0','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>'0','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>$accountID,'transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'5000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'5000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01']
    
               ]);    

$accountID=6;$userID=2;
  \DB::table('transactions')->insert([
            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>'0','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>'0','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>$accountID,'transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'5000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'5000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01']
    
               ]);  
  $userID=2;$accountID=6;
   \DB::table('transactions')->insert([
            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>'0','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>'0','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'10000','out_flow_amount' =>$accountID,'transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'5000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'5000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>'1','envelop_sub_cat_id' =>'1','mortgage_id' =>NULL,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>1,'memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-10-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01'],

            ['user_id'=>$userID,'account_id' =>$accountID,'envelop_id' =>NULL,'envelop_sub_cat_id' =>NULL,'mortgage_id' =>'1','memo' =>"Test Memo",'in_flow_amount' =>'0','out_flow_amount' =>'6000','transaction_date' =>'2021-11-01']
    
               ]);  

    }
}
