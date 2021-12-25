<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    





// report page
public function report(){
    
   return response()->json(["total_budget"=>0]);
}

// dashboard page
public function dashboard($budgetID){
    
   return response()->json([
    "total_budget"=>getTotalBudget($budgetID),
    "used_budget"=>getTotalUsedBudget($budgetID),
    "my_gaols"=>getTotalUsedBudget($budgetID),
    "my_obligations"=>getTotalUsedBudget($budgetID),
    "upcoming_expenses"=>getTotalUsedBudget($budgetID)
                           ]);
}

function practiceData(){

// first date should be less than the second one
return response()->json([
    "budget_amount"=>getTotalAmountAvailableInAccountsForBudget(1),
    // "budget_accounts"=>getAccountsForBudget(1),
    "current_date"=>date("Y-m-d"),
    "number_of_weeks"=>dateDiff("ww","2021-01-01",date("Y-m-d")),
    "number_of_months"=>dateDiff("m","2021-01-01",date("Y-m-d"))+2,
    "check_if_date_is_passed_or_not"=>dateDiff("d","2021-01-01","2021-01-01"),
]);

}

}
