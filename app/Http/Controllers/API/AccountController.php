<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AccountType;
use App\Models\Account;
use App\Http\Requests\CreateAccountRequest;
use Illuminate\Support\Facades\Validator;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response()->json(['accounts'=>Account::select('id', 'account_title','current_amount')->where("user_id","=",getLoggedInUser()->id)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function getSpecificBudgetAccounts($budgetID){

         return response()->json(['accounts'=>getAccountsForBudget($budgetID)]);
    }

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
           $request->request->add(['is_account_unlinked' => 1]);
           $request->request->add(['user_id' => getLoggedInUser()->id]);
           $validator = Validator::make($request->all(),Account::$rules);
           $input=$request->all();
            $account="";
            if( strlen(Account::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>Account::validateIfAllRequiredFieldsExist($input)],422);
            }
           // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
            // check if account already exists for this usr
             if(Account::checkAccountAlreadyExistsOrNot($input['account_title'])>0){
                 return   response()->json(["message"=>__('account.account_already_exists')],422);;
                }
                // adding reccord to database
                 try{
                    $account=new Account;
                    $account->user_id=$input['user_id'];
                    $account->account_title=$input['account_title'];
                    $account->current_amount=$input['current_amount'];
                    $account->is_account_unlinked=$input['is_account_unlinked'];
                    $account->account_type_id=$input['account_type_id'];
                    $account->budget_id=$input['budget_id'];
                    $account->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }
          
      return response()->json(["account"=>$account,"message"=>__('account.account_added_successfully')],200);;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

          if (!getLoggedInUser()->can('view', Account::find($id))) {
                return unAuthorizedAction();
                }
           $account=Account::find($id);
          if (getLoggedInUser()->can('view', $account)) {
             return response()->json(["account"=>$account],200);;
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
        if (getLoggedInUser()->can('update', Account::find($id))) {
           $request->request->add(['is_account_unlinked' => 1]);
           $request->request->add(['user_id' => getLoggedInUser()->id]);
           $validator = Validator::make($request->all(),Account::$rules);
           $input=$request->all();
            $account="";
            if( strlen(Account::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>Account::validateIfAllRequiredFieldsExist($input)],422);
            }
           // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
            
                // adding reccord to database
                 try{
                    $account=Account::find($id);
                    $account->user_id=$input['user_id'];
                    $account->account_title=$input['account_title'];
                    $account->current_amount=$input['current_amount'];
                    $account->is_account_unlinked=$input['is_account_unlinked'];
                    $account->account_type_id=$input['account_type_id'];
                    $account->budget_id=$input['budget_id'];
                    $account->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }
          
          return response()->json(["account"=>$account,"message"=>__('account.account_updated_successfully')],200);;

         }else{
          return unAuthorizedAction();
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
     if (getLoggedInUser()->can('delete',Account::find($id))) {
             $account=Account::destroy($id);

         if($account){
             return response()->json(["message"=>__('account.account_deleted_successfully')],200);;
                 }else{
             return response()->json(["message"=>__('account.no_account_found_with_this_id')],422);;
         }
           }else{
                return unAuthorizedAction();
            }
       
    }



//    public function showDemoJSONData()
//     {
//         // change value inside collection
//           $users=User::All();
//           $changed = $users->map(function ($value, $key) {
//           $value['is_email_verified'] = ["value"=>10];
//           $value['is_sms_verified'] = AccountType::find(1);
//           return $value;
//        });
//  //   end return new collection
// // return $changed->all();
//        return response()->json(['account'=>$changed ,'users'=> User::All(),'comment'=>User::All()]);
//     }



}






