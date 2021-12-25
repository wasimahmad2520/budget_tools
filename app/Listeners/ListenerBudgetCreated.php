<?php

namespace App\Listeners;

use App\Events\EventBudgetCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ListenerBudgetCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BudgetCreated  $event
     * @return void
     */
    public function handle(EventBudgetCreated $event)
    {
       
      $budget=$event->budget;
      $budgetID=$budget->id;
      $userID=$budget->user_id;


// insert first envelop
         $envelopID=\DB::table('envelops')->insertGetId(
            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Monthly Expenses']
               );
// insert first envelop sub categories 
          \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Housing','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Car','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Issurance','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Cell Phone','total_budget'=>0],
                                                   ]);

// insert second envelop
         $envelopID=\DB::table('envelops')->insertGetId(
            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Frequent Expenses']
               );
// insert second envelop sub categories 
         \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Home Owner Issurance','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Clothing','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Deodorant','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Medical Bill','total_budget'=>0],
                                                   ]);


// insert third envelop
         $envelopID=\DB::table('envelops')->insertGetId(
            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Immediate Obligations']
               );
// insert third envelop sub categories 
         \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Rent/Mortgage','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Electric','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Water ' ,'total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Internet','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Groceries','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Transportations','total_budget'=>0],
                                                   ]);




// insert third envelop
         $envelopID=\DB::table('envelops')->insertGetId(
            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Debt Payments']
               );
// insert third envelop sub categories 
         \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Student Loan','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Auto Loan','total_budget'=>0],
           
                                                   ]);

// insert third envelop
         $envelopID=\DB::table('envelops')->insertGetId(
            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'True Expenses']
               );
// insert third envelop sub categories 
         \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Auto Maintenance','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Home Maintenance','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Gifts ' ,'total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Software Subscriptions','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Stuff I forgot budget For','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Devices Replacements','total_budget'=>0],
                                                   ]);


// insert third envelop
         $envelopID=\DB::table('envelops')->insertGetId(
            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Giving']
               );
// insert third envelop sub categories 
         \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Birth\'s Day','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Mother\'s Day','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Father\'s Day ' ,'total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Valintine\'s Day','total_budget'=>0],
                                                   ]);


// insert fourth envelop
         $envelopID=\DB::table('envelops')->insertGetId(
            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Short Term Saving']
               );
// insert fourth envelop sub categories 
       \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Appliance','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Furniture','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Large Tools ' ,'total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Fishing Gear','total_budget'=>0],
                                                     ]);

// insert fourth envelop
         $envelopID=\DB::table('envelops')->insertGetId(
            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Excercise']
               );
// insert fourth envelop sub categories 
       \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Gym','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Out Door Running','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Karate ' ,'total_budget'=>0],
                                                     ]);


// insert fourth envelop
         $envelopID=\DB::table('envelops')->insertGetId(
            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Gaming']
               );
// insert fourth envelop sub categories 
       \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'GTA Under Ground','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Delta Force','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Need For Speed ' ,'total_budget'=>0],
                                                     ]);

// insert fourth envelop
         $envelopID=\DB::table('envelops')->insertGetId(
            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Study']
               );

// insert fourth envelop sub categories 
       \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'General Study Books','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Course Study Books','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'Books for children ' ,'total_budget'=>0],
                                                     ]);

// insert fourth envelop
         $envelopID=\DB::table('envelops')->insertGetId(
            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Clothing']
               );
        
// insert fourth envelop sub categories 
       \DB::table('envelop_sub_categories')->insert([
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>'My Clothing','total_budget'=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>"Wife's Clothing","total_budget"=>0],
            ['user_id'=>$userID,'envelop_id'=>$envelopID,'envelop_sub_category_name' =>"Children's Clothing" ,'total_budget'=>0],
                                                     ]);


    }
}




 // ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Frequent Expenses'],
 //            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Giving'],
 //            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Short Term Saving'],
 //            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Study'],
 //            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Clothing'],
 //            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Exercise'],
 //            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Just For Fun'],
 //            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Gaming'],
 //            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Music'],
 //            ['budget_id'=>$budgetID,'user_id'=>$userID,'name' =>'Fun Money'],



