<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Settings;
use App\Models\User;
use App\Models\Budget;
use App\Models\Currency;
use App\Models\NumberFormat;
use App\Models\DateFormat;
use App\Events\EventBudgetCreated;
use App\Models\Envelop;
use App\Models\AccountType;
use App\Models\EnvelopSubCategory;
use App\Models\EnvelopGoal;
use App\Models\Mortgage;
use App\Models\Account;
use App\Models\Transaction;
// use DB;
function welcomeHelper(){

}

/**
 * @param $interval
 * @param $datefrom
 * @param $dateto
 * @param bool $using_timestamps
 * @return false|float|int|string
 */
function dateDiff($interval, $datefrom, $dateto, $using_timestamps = false)
{
    /*
    $interval can be:
    yyyy - Number of full years
    q    - Number of full quarters
    m    - Number of full months
    y    - Difference between day numbers
           (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
    d    - Number of full days
    w    - Number of full weekdays
    ww   - Number of full weeks
    h    - Number of full hours
    n    - Number of full minutes
    s    - Number of full seconds (default)
    */

    if (!$using_timestamps) {
        $datefrom = strtotime($datefrom, 0);
        $dateto   = strtotime($dateto, 0);
    }

    $difference        = $dateto - $datefrom; // Difference in seconds
    $months_difference = 0;

    switch ($interval) {
        case 'yyyy': // Number of full years
            $years_difference = floor($difference / 31536000);
            if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
                $years_difference--;
            }

            if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
                $years_difference++;
            }

            $datediff = $years_difference;
        break;

        case "q": // Number of full quarters
            $quarters_difference = floor($difference / 8035200);

            while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
                $months_difference++;
            }

            $quarters_difference--;
            $datediff = $quarters_difference;
        break;

        case "m": // Number of full months
            $months_difference = floor($difference / 2678400);

            while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
                $months_difference++;
            }

            $months_difference--;

            $datediff = $months_difference;
        break;

        case 'y': // Difference between day numbers
            $datediff = date("z", $dateto) - date("z", $datefrom);
        break;

        case "d": // Number of full days
            $datediff = floor($difference / 86400);
        break;

        case "w": // Number of full weekdays
            $days_difference  = floor($difference / 86400);
            $weeks_difference = floor($days_difference / 7); // Complete weeks
            $first_day        = date("w", $datefrom);
            $days_remainder   = floor($days_difference % 7);
            $odd_days         = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?

            if ($odd_days > 7) { // Sunday
                $days_remainder--;
            }

            if ($odd_days > 6) { // Saturday
                $days_remainder--;
            }

            $datediff = ($weeks_difference * 5) + $days_remainder;
        break;

        case "ww": // Number of full weeks
            $datediff = floor($difference / 604800);
        break;

        case "h": // Number of full hours
            $datediff = floor($difference / 3600);
        break;

        case "n": // Number of full minutes
            $datediff = floor($difference / 60);
        break;

        default: // Number of full seconds (default)
            $datediff = $difference;
        break;
    }

    return $datediff;
}
// reeturn the curent logeed in user
function getLoggedInUser(){
return auth()->user();
}

// return unauthorized action json object
function unAuthorizedAction(){

	return response()->json(["message"=>__('lang.un_authorized_action')],401);;
}


// insert or updat option value
function insertOrUpdateOptionValue($optionName,$value){
	$result=0;
    $setting=Settings::all()->where("user_id","=",getLoggedInUser()->id)->where("option_name","=",$optionName);
    $id=0;
    foreach($setting as $s){
     $id=$s->id;
    }
      if(count($setting)==0){
          Settings::create([
          'user_id'=>getLoggedInUser()->id,
          'option_name'=>$optionName,
          'option_value'=>$value,
                        ]);
          $result=1;
      }else{
      	$model=Settings::find($id);
      	$model->option_value=$value;
      	$model->save();
      	$result=2;
      }

      return $result;

}



// get envelop with child reccords , also get real values despite of foreing keys
function getEnvelopsWithChildDetail(){
  $envelops=Envelop::select('id', 'name','updated_at as envelop_sub_items')->where("user_id","=",getLoggedInUser()->id)->get();
          // placing children inside evelope categories (Monthly->car,issurance,housing)
           $evelopsWithChildren = $envelops->map(function ($value, $key) {

            // get the children for the envelop (Envelop Cateogry)
            $envelopSubItems=EnvelopSubCategory::select('id as sub_cat_id','envelop_sub_category_name','total_budget','updated_at as envelop_goals')->where("envelop_id","=",$value['id'])->where("user_id","=",getLoggedInUser()->id)->get() ;

            // assign it to envelop_sub_items
           $value['envelop_sub_items'] = $envelopSubItems;
           return $value;
                                            }); //first loop ends
           return $envelops;
}



// return currency symbol replacement value, 1 for start, 2 for end, 3 for none
 function getCurrencySymbolReplacement($value=1)
{
 $replacement="start";
switch($value){

  case 1:
 $replacement="start";
  break;
  case 2:
 $replacement="end";
  break;
  case 3:
 $replacement="none";
  break;
}

return $replacement;
}



// get number Date format for specific id
function getDateFormatObject($dateFormatID){

 return  \DB::table('date_formats')->where(['id'=>$dateFormatID])->first();
}

// get currency object for specific id
function getDCurrencyObject($currencyID){

 return  \DB::table('currencies')->where(['id'=>$currencyID])->first();
}

// get number format object for specific id
function getNumberFormatObject($numberFormatID){
 return  \DB::table('number_formats')->where(['id'=>$numberFormatID])->first();
}




// get all accounts for logged in user
function getAccounts(){

return Account::select('id','account_title','current_amount')->where("user_id","=",getLoggedInUser()->id)->get();

}


// get budget with real data instead of foreign keys
function getBudgetsWithChildDetail(){

  $budgets=Budget::select('id', 'budget_name','currency_id','currency_symbol_placement','date_format_id','number_format_id','updated_at as currency_symbol','updated_at as currency_code','updated_at as currency_symbol_replacement','updated_at as date_format','updated_at as number_format')->where("user_id","=",getLoggedInUser()->id)->get();
   // placing children inside evelope categories (Monthly->car,issurance,housing)
           $budgetsWithChildren = $budgets->map(function ($value, $key) {

            // assign it to envelop_sub_items
           $value['currency_symbol'] =getDCurrencyObject($value['currency_id'])->symbol;
           $value['currency_code'] =getDCurrencyObject($value['currency_id'])->code;
           $value['currency_symbol_replacement'] =getCurrencySymbolReplacement($value['currency_symbol_placement']);
           $value['date_format'] =getDateFormatObject($value['date_format_id'])->format;
           $value['number_format'] =getNumberFormatObject($value['number_format_id'])->format;
           return $value;
                                            }); //first loop ends
return $budgetsWithChildren;
}


function getTransactions($accountID=1){
  return $transactions=Transaction::select('id', 'user_id','account_id','envelop_id','mortgage_id','in_flow_amount','out_flow_amount',
  'transaction_date','is_envelop_or_mortgage','memo','transaction_status')
  ->where("user_id","=",getLoggedInUser()->id)->where("account_id","=",$accountID)->get();

}

// get transaction specific account object
function getTransactionsForSpecificAccount($accountID){
  return $transactions=Transaction::select('id', 'user_id','account_id','envelop_id','mortgage_id','in_flow_amount','out_flow_amount',
  'transaction_date','is_envelop_or_mortgage','memo','transaction_status')
  ->where("user_id","=",getLoggedInUser()->id)->where("account_id","=",$accountID)->get();

}



// get cleared balance
function getClearedBalance($accountID){

 return Transaction::all()->where("transaction_status","=","1")->where("account_id","=",$accountID)->sum('out_flow_amount')+Transaction::all()->where("transaction_status","=","1")->where("account_id","=",$accountID)->sum('in_flow_amount');

}


// get uncleared balance
function getUnClearedBalance($accountID){
 return Transaction::all()->where("transaction_status","=","2")->where("account_id","=",$accountID)->sum('out_flow_amount')+Transaction::all()->where("transaction_status","=","2")->where("account_id","=",$accountID)->sum('in_flow_amount');

}

// get both cleared and un cleared balance for account
function getTotalClearedAndUnClearedBalance($accountID){
 return getClearedBalance($accountID)+getUnClearedBalance($accountID);

}



// get total amount available in accounts for budget()
function getTotalAmountAvailableInAccountsForBudget($budgetID){

 return Account::all()->where("budget_id","=",$budgetID)->sum('current_amount');
}


// get all account available  for budget
function getAccountsForBudget($budgetID){

return Account::select('id', 'account_title','current_amount')->where("budget_id","=",$budgetID)->where("user_id","=",getLoggedInUser()->id)->get();
}

// dashboard functions

// get total budget
function getTotalBudget($budgetID){
return getTotalAmountAvailableInAccountsForBudget($budgetID);
}

// get used  budget
function getTotalUsedBudget($budgetID){

return getTotalAmountAvailableInAccountsForBudget($budgetID)-55000;
}

// get used  budget
function getTotalGoalsAmount($budgetID){

return EnvelopGoal::all()->where("transaction_status","=","2")->where("account_id","=",$accountID)->sum('out_flow_amount');
}
// get my obligation amount
function getTotalMyObligationAmountAmount($budgetID){

}

// get Upcoming Expenses
function getToalUpcommingExpenses($budgetID){

}



// get envelop sub categories by envelop id
function getEnvelopSubCategories($envelopID){

  return EnvelopSubCategory::select('id as sub_cat_id','envelop_sub_category_name','total_budget','updated_at as envelop_goals','updated_at as manipulated_data_object')
  ->where("envelop_id","=",$envelopID)->where("user_id","=",getLoggedInUser()->id)->get(); 
}

// return the envelop goal single object
function getEnvelopGoalObject($envelopSubCategoryID){

   return \DB::table('envelop_goals')->select("id","envelop_sub_category_id","total_amount","duration_type","weekly_value","monthly_value","transaction_date","status")->where('envelop_sub_category_id',"=",$envelopSubCategoryID)->where("user_id","=",getLoggedInUser()->id)->first();
}



// get budgets for logged in user
function getBudgets(){

  return Budget::select('id', 'budget_name')->where("user_id","=",getLoggedInUser()->id)->get();
}


// check either the goal duration type is weekly,monthly or by date

function checkGoalDurationType($envelopGoal){

$durationType="";
$durationCount=0;
$calculatedAmount=0;
switch($envelopGoal->duration_type){
  case "weekly":
    $durationType=$envelopGoal->duration_type;
    $durationCount=dateDiff("ww",$envelopGoal->transaction_date,date("Y-m-d"));
     $calculatedAmount=  ($durationCount * $envelopGoal->total_amount);
  break;
  case "monthly":
    $durationType=$envelopGoal->duration_type;
     $durationCount=dateDiff("m",$envelopGoal->transaction_date,date("Y-m-d"))+2;
     $calculatedAmount=  ($durationCount * $envelopGoal->total_amount);
  break;
  case "by_date":
    $durationType=$envelopGoal->duration_type;
    $durationCount=dateDiff("d",$envelopGoal->transaction_date,date("Y-m-d"));
    if($durationCount<1){
          $calculatedAmount=  (1 * $envelopGoal->total_amount);
               }

  break;
default:
   $durationType="weekly";
}

 $durationTypesArray= array(
  "transaction_date"=>$envelopGoal->transaction_date,
  "current_date"=>date("Y-m-d"),
  "duration_type"=>$durationType,
  "goal_tartget_amount"=>$envelopGoal->total_amount,
  "number_of_passed_durations"=>$durationCount,
  "calculated_amount"=>$calculatedAmount
                           );
return $durationTypesArray;

}


// budget detail functions
// get total budgeted amount for budget

function getBudgetedAmount($budgetID){
$result= \DB::select("SELECT sum(ec.total_budget) as total_budget FROM `envelops` as e,envelop_sub_categories as ec where e.id=ec.envelop_id and e.budget_id=1;");;

$totalBudgetedAmount=0;
foreach($result as $r){
  $totalBudgetedAmount=$r->total_budget;
}

return $totalBudgetedAmount;
}





?>