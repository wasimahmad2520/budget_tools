<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Budget;
use App\Models\Envelop;
use App\Models\User;
use App\Models\AccountType;
use App\Models\EnvelopSubCategory;
use App\Models\EnvelopGoal;


class EnvelopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


          $envelops=Envelop::select('id', 'name','updated_at as envelop_sub_items')->where("user_id","=",getLoggedInUser()->id)->get();


          // placing children inside evelope categories (Monthly->car,issurance,housing)
           $evelopsWithChildren = $envelops->map(function ($value, $key) {


            // get the children for the envelop (Envelop Cateogry)
            $envelopSubItems=getEnvelopSubCategories($value['id']);


           // inner loop start
           // looping over the envelopSubItems 
           $envelopSubItemsChanged=$envelopSubItems->map(function ($valueEnvelopSubItem, $keyEnvelopSubItem) {

            // query goals data and place in envelop_goals
               $envelopGoals=getEnvelopGoalObject($valueEnvelopSubItem['sub_cat_id']);

             //placing data inside envelop goals 
             $valueEnvelopSubItem['envelop_goal']= $envelopGoals;
                                                          });
          // inner loop ends


            // assign it to envelop_sub_items
           $value['envelop_sub_items'] = $envelopSubItems;
           return $value;
                                           

                                            }); //first loop ends



        return response()->json([
        'budgets'=>getBudgets(),
        "envelops"=>$evelopsWithChildren,
        "total_amount_available_in_accounts_for_budget"=>getTotalAmountAvailableInAccountsForBudget(1)
        ]);

    }


public function getEnvelopsAndChildDataForBudget($budgetID){


 $envelops=Envelop::select('id', 'budget_id','name','updated_at as envelop_sub_items')->where("budget_id","=",$budgetID)->where("user_id","=",getLoggedInUser()->id)->get();


          // placing children inside evelope categories (Monthly->car,issurance,housing)
           $evelopsWithChildren = $envelops->map(function ($value, $key) {


            // get the children for the envelop (Envelop Cateogry)
            $envelopSubItems=getEnvelopSubCategories($value['id']);
           // inner loop start
           // looping over the envelopSubItems 
           $envelopSubItemsChanged=$envelopSubItems->map(function ($valueEnvelopSubItem, $keyEnvelopSubItem) {

            // query goals data and place in envelop_goals
               $envelopGoals=getEnvelopGoalObject($valueEnvelopSubItem['sub_cat_id']);

             //placing data inside envelop goals 
             $valueEnvelopSubItem['envelop_goal']= $envelopGoals;
             $valueEnvelopSubItem['manipulated_data_object']=   checkGoalDurationType($envelopGoals);
           
                                                          });
          // inner loop ends


            // assign it to envelop_sub_items
           $value['envelop_sub_items'] = $envelopSubItems;
           return $value;
                                           

                                            }); //first loop ends



        return response()->json([
        'budgets'=>getBudgets(),
        "envelops"=>$evelopsWithChildren,
        "total_budgeted_amount"=>getBudgetedAmount($budgetID),
        "total_activity_amount"=>getBudgetedAmount($budgetID),
        "total_available_amount"=>getBudgetedAmount($budgetID),
        "total_in_flows_amount"=>getBudgetedAmount($budgetID),
        "total_under_funded_amount"=>getBudgetedAmount($budgetID),
        "total_budgted_last_month"=>getBudgetedAmount($budgetID),
        "total_average_spent"=>getBudgetedAmount($budgetID),
        "reset_available_amount"=>getBudgetedAmount($budgetID),
        "reset_budgeted_amount"=>getBudgetedAmount($budgetID),
        "total_amount_available_in_accounts_for_budget"=>getTotalAmountAvailableInAccountsForBudget(1)
        ]);

}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         // if (getLoggedInUser()->can('create', Envelop::class)) {
         //  return  unAuthorizedAction();
         //   }else{
            
         //  }
           $request->request->add(['user_id' => getLoggedInUser()->id]);
           $validator = Validator::make($request->all(),Envelop::$rules);
           $input=$request->all();
           $envelop="";
            if( strlen(Envelop::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>Envelop::validateIfAllRequiredFieldsExist($input)],422);
            }
             // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
            // check if budget already exists for this usr
                if(Envelop::checkEnvelopAlreadyExistsOrNot($input['name'])>0){
                 return   response()->json(["message"=>__('envelop.envelop_already_exists')],422);;
                }
           try{
            $envelop=new Envelop;
             $envelop->user_id=$input['user_id'];
             $envelop->budget_id=$input['budget_id'];
             $envelop->name=$input['name'];
             $envelop->save();
            }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }
           return response()->json(["envelop"=>$envelop,"message"=>__('envelop.envelop_added_successfully')],200);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $envelop=Envelop::find($id);

        if (getLoggedInUser()->can('view', $envelop)) {

         if($envelop){
          return response()->json(["envelop"=>$envelop],200);;
         }else{
            return response()->json(["message"=>__('envelop.no_envelop_found_with_this_id')],422);;
             }
         }else{
         return  unAuthorizedAction();
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    if (getLoggedInUser()->can('update', Envelop::find($id))) {


         $request->request->add(['user_id' => getLoggedInUser()->id]);
           $validator = Validator::make($request->all(),Envelop::$rules);
           $input=$request->all();
           $envelop="";
            if( strlen(Envelop::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>Envelop::validateIfAllRequiredFieldsExist($input)],422);
            }
             // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
           // check if budget already exists for this usr
               
           try{
            $envelop=Envelop::find($id);
             $envelop->user_id=$input['user_id'];
             $envelop->budget_id=$input['budget_id'];
             $envelop->name=$input['name'];
             $envelop->save();
            }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }

        }else{
         return  unAuthorizedAction();
          }
           return response()->json(["envelop"=>$envelop,"message"=>__('envelop.envelop_updated_successfully')],200);;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    if (getLoggedInUser()->can('delete', Envelop::find($id))) {

         $envelop=Envelop::destroy($id);

         if($envelop){
             return response()->json(["message"=>__('envelop.envelop_deleted_successfully')],200);;
         }else{
            return response()->json(["message"=>__('envelop.no_envelop_found_with_this_id')],422);;
         }
         }else{
             return  unAuthorizedAction();
          }
    }
}
