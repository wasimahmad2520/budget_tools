<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {




$mortgages=Mortgage::all()->where("user_id","=",getLoggedInUser()->id);
       return response()->json([
         'envelops'=>  getEnvelopsWithChildDetail(),
         'mortgages'=>$mortgages,
         'accounts'=>getAccounts(),
         'transactions'=>getTransactions(1),
         'budgets'=>getBudgetsWithChildDetail(),
          'total_cleared_and_un_cleared_balance'=>getTotalClearedAndUnClearedBalance($accountID),
        'cleared_balance'=>getClearedBalance($accountID),
        'un_cleared_balance'=>getUnClearedBalance($accountID),
        
    ]);
    }


// get specific accoutn transations
    public function getAccountTransactions($accountID)
    {
        $mortgages=Mortgage::all()->where("user_id","=",getLoggedInUser()->id);
       return response()->json([
         'envelops'=>  getEnvelopsWithChildDetail(),
         'mortgages'=>$mortgages,
         'accounts'=>getAccounts(),
         'transactions'=>getTransactionsForSpecificAccount($accountID),
         'budgets'=>getBudgetsWithChildDetail(),
        'total_cleared_and_un_cleared_balance'=>getTotalClearedAndUnClearedBalance($accountID),
        'cleared_balance'=>getClearedBalance($accountID),
        'un_cleared_balance'=>getUnClearedBalance($accountID),
        
        
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
        // if (getLoggedInUser()->can('create', Transaction::class)) {
        //     }else{
        //     return  unAuthorizedAction();
        //     }
           $request->request->add(['user_id' => getLoggedInUser()->id]);
          if(!$request->has("memo")){
            $request->request->add(['memo' => NULL]);
          }

           // check seprate validation for envelop and mortage
           $validator; $input; $transaction;
           if($request->has("envelop_id")){
            // add the required fields for envelop
               if(!$request->has("mortgage_id")){
                        $request->request->add(['mortgage_id' => 0]);
                    }
           
            $request->request->add(['is_envelop_or_mortgage' => 1]);
            $validator = Validator::make($request->all(),Transaction::$rulesEnvelop);
             $input=$request->all();
           //check if all fields exists for envelop
            if( strlen(Transaction::validateIfAllRequiredFieldsExistForEnvelop($input))>0){
              return response(["message"=>Transaction::validateIfAllRequiredFieldsExistForEnvelop($input)],422);
            }

           }else{
            // add the requied fields for mortgage
            if(!$request->has("envelop_id")){
               $request->request->add(['envelop_id' => NULL]);
            }
           if(!$request->has("envelop_sub_cat_id")){
            $request->request->add(['envelop_sub_cat_id' => NULL]);
           }
         
           $request->request->add(['is_envelop_or_mortgage' => 2]);
            $input=$request->all();
            // return $request;
           // check if all fileds exists for mortgage
           $validator = Validator::make($request->all(),Transaction::$rulesMortgage);
            if( strlen(Transaction::validateIfAllRequiredFieldsExistForMortgage($input))>0){
              return response(["message"=>Transaction::validateIfAllRequiredFieldsExistForMortgage($input)],422);
            }
          }

             // check if failed or not
           if ($validator->fails()) {
            // return $request;
             return  response()->json($validator->messages(),422);;
             }else{

           $transaction=new Transaction;
           $transaction->user_id=$input['user_id'];
           $transaction->account_id=$input['account_id'];
           $transaction->mortgage_id=$input['mortgage_id'];
           $transaction->envelop_id=$input['envelop_id'];
           $transaction->envelop_sub_cat_id=$input['envelop_sub_cat_id'];
           $transaction->is_envelop_or_mortgage=$input['is_envelop_or_mortgage'];
           $transaction->in_flow_amount=$input['in_flow_amount'];
           $transaction->out_flow_amount=$input['out_flow_amount'];
           $transaction->memo=$input['memo'];
           $transaction->save();

            }
             return response()->json(["transaction"=>$transaction,"message"=>__('transaction.transaction_added_successfully')],200);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

             if (!getLoggedInUser()->can('update', Transaction::find($id))) {
                   return unAuthorizedAction();
                 }

        $request->request->add(['user_id' => getLoggedInUser()->id]);
          if(!$request->has("memo")){
            $request->request->add(['memo' => NULL]);
          }

           // check seprate validation for envelop and mortage
           $validator; $input; $transaction;
           if($request->has("envelop_id")){
            // add the required fields for envelop
               if(!$request->has("mortgage_id")){
                        $request->request->add(['mortgage_id' => 0]);
                    }
           
            $request->request->add(['is_envelop_or_mortgage' => 1]);
            $validator = Validator::make($request->all(),Transaction::$rulesEnvelop);
             $input=$request->all();
           //check if all fields exists for envelop
            if( strlen(Transaction::validateIfAllRequiredFieldsExistForEnvelop($input))>0){
              return response(["message"=>Transaction::validateIfAllRequiredFieldsExistForEnvelop($input)],422);
            }

           }else{
            // add the requied fields for mortgage
            if(!$request->has("envelop_id")){
               $request->request->add(['envelop_id' => NULL]);
            }
           if(!$request->has("envelop_sub_cat_id")){
            $request->request->add(['envelop_sub_cat_id' => NULL]);
           }
         
           $request->request->add(['is_envelop_or_mortgage' => 2]);
            $input=$request->all();
            // return $request;
           // check if all fileds exists for mortgage
           $validator = Validator::make($request->all(),Transaction::$rulesMortgage);
            if( strlen(Transaction::validateIfAllRequiredFieldsExistForMortgage($input))>0){
              return response(["message"=>Transaction::validateIfAllRequiredFieldsExistForMortgage($input)],422);
            }
          }
             // check if failed or not
           if ($validator->fails()) {
            // return $request;
             return  response()->json($validator->messages(),422);;
             }else{

           $transaction=Transaction::findOrfail($id);
           $transaction->user_id=$input['user_id'];
           $transaction->account_id=$input['account_id'];
           $transaction->mortgage_id=$input['mortgage_id'];
           $transaction->envelop_id=$input['envelop_id'];
           $transaction->envelop_sub_cat_id=$input['envelop_sub_cat_id'];
           $transaction->is_envelop_or_mortgage=$input['is_envelop_or_mortgage'];
           $transaction->in_flow_amount=$input['in_flow_amount'];
           $transaction->out_flow_amount=$input['out_flow_amount'];
           $transaction->memo=$input['memo'];
           $transaction->save();

            }
             return response()->json(["transaction"=>$transaction,"message"=>__('transaction.transaction_updated_successfully')],200);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

      if (getLoggedInUser()->can('delete',Transaction::find($id))) {
             $transaction=Transaction::destroy($id);

         if($transaction){
             return response()->json(["message"=>__('transaction.transaction_deleted_successfully')],200);;
                 }else{
             return response()->json(["message"=>__('transaction.no_transaction_found_with_this_id')],422);;
         }
           }else{
                return unAuthorizedAction();
            }


    }
}
