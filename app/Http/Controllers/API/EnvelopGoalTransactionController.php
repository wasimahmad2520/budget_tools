<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GoalTransaction;
use Illuminate\Support\Facades\Validator;

class EnvelopGoalTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return response()->json(['envelop_goal_transactions'=>GoalTransaction::select('id', 'total_amount','budget_id','envelop_id','goal_id','transaction_date','is_from_envelop_to_goal')->where("user_id","=",getLoggedInUser()->id)->get()]);
    }


   public function getSpecificBudgetTransactions($budgetID){

     return response()->json(['envelop_goal_transactions'=>GoalTransaction::select('id', 'total_amount','budget_id','envelop_id','goal_id','transaction_date','is_from_envelop_to_goal')->where("budget_id","=",$budgetID)->where("user_id","=",getLoggedInUser()->id)->get()]);
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

           $request->request->add(['user_id' => getLoggedInUser()->id]);
            if(!$request->has("is_from_envelop_to_goal")){
              $request->request->add(['is_from_envelop_to_goal' => 1]);
            }
             

            if(!$request->has("goal_id")){
              $request->request->add(['goal_id' => NULL]);
            }
             

           $validator = Validator::make($request->all(),GoalTransaction::$rules);
           $input=$request->all();

            $transaction="";
            if( strlen(GoalTransaction::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>GoalTransaction::validateIfAllRequiredFieldsExist($input)],422);
            }

                // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
            // check if account already exists for this usr
        
                // adding reccord to database
                 try{
                    $transaction=new GoalTransaction;
                    $transaction->user_id=$input['user_id'];
                    $transaction->budget_id=$input['budget_id'];
                    $transaction->total_amount=$input['total_amount'];
                    $transaction->envelop_id=$input['envelop_id'];
                    $transaction->goal_id=$input['goal_id'];
                    $transaction->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }
          
      return response()->json(["transaction"=>$transaction,"message"=>__('envelop_goal_transaction.transaction_added_successfully')],200);;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         if (!getLoggedInUser()->can('view', GoalTransaction::find($id))) {
                return unAuthorizedAction();
                }
        return response()->json(['envelop_goal_transaction'=>GoalTransaction::select('id', 'total_amount','budget_id','envelop_id','goal_id','transaction_date','is_from_envelop_to_goal')->where("id","=",$id)->where("user_id","=",getLoggedInUser()->id)->get()]);
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


         if (!getLoggedInUser()->can('update', GoalTransaction::find($id))) {
                return unAuthorizedAction();
                }
         $request->request->add(['user_id' => getLoggedInUser()->id]);
            if(!$request->has("is_from_envelop_to_goal")){
              $request->request->add(['is_from_envelop_to_goal' => 1]);
            }
             

            if(!$request->has("goal_id")){
              $request->request->add(['goal_id' => NULL]);
            }
             

           $validator = Validator::make($request->all(),GoalTransaction::$rules);
           $input=$request->all();

            $transaction="";
            if( strlen(GoalTransaction::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>GoalTransaction::validateIfAllRequiredFieldsExist($input)],422);
            }

                // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
            // check if account already exists for this usr
        
                // adding reccord to database
                 try{
                    $transaction= GoalTransaction::findOrfail($id);
                    $transaction->user_id=$input['user_id'];
                    $transaction->budget_id=$input['budget_id'];
                    $transaction->total_amount=$input['total_amount'];
                    $transaction->envelop_id=$input['envelop_id'];
                    $transaction->goal_id=$input['goal_id'];
                    $transaction->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }
          
      return response()->json(["transaction"=>$transaction,"message"=>__('envelop_goal_transaction.transaction_updated_successfully')],200);;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (getLoggedInUser()->can('delete',GoalTransaction::find($id))) {
             $account=GoalTransaction::destroy($id);

         if($account){
             return response()->json(["message"=>__('envelop_goal_transaction.transaction_deleted_successfully')],200);;
                 }else{
             return response()->json(["message"=>__('envelop_goal_transaction.no_transaction_found_with_this_id')],422);;
         }
           }else{
                return unAuthorizedAction();
            }
    }
}
