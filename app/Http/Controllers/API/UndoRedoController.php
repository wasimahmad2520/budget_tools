<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;
use App\Models\Envelop;
use App\Models\EnvelopGoal;
use App\Models\UndoRedoBudgetHistory;
use Illuminate\Support\Facades\Validator;
class UndoRedoController extends Controller
{
    // others functions except the default resource functions



public function putExpensesHistory(Request $request){


          return $request;
          $request->request->add(['user_id' => getLoggedInUser()->id]);
           $validator = Validator::make($request->all(),UndoRedoBudgetHistory::$rules);
           // if the request does not have hte value
           if(!$request->has("weekly_value")){
               $request->request->add(['weekly_value' => NULL]);
           }
           if(!$request->has("monthly_value")){
               $request->request->add(['monthly_value' => NULL]);
           }

           if(!$request->has("transaction_date")){
               $request->request->add(['transaction_date' => date('Y-m-d')]);
           }

           if(!$request->has("duration_type")){
               $request->request->add(['transaction_date' => "weekly"]);
           }
            // return $request;
           $input=$request->all();
            if( strlen(UndoRedoBudgetHistory::validateIfAllRequiredFieldsExistForPutHistory($input))>0){
              return response(["message"=>UndoRedoBudgetHistory::validateIfAllRequiredFieldsExistForPutHistory($input)],422);
            }
            // updating the same table for redo the reccord
            $undoOrRedoes=UndoRedoBudgetHistory::all()->where("budget_id","=",$input['budget_id']);
            foreach($undoOrRedoes as $ud){
                $reccord=UndoRedoBudgetHistory::findOrfail($ud->id);
                $reccord->is_undo=2;
                $reccord->save();
            }

            $redoUndoHistory="";
        // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
           
                // adding reccord to database
                 try{
                    $redoUndoHistory=new UndoRedoBudgetHistory;
                    $redoUndoHistory->user_id=$input['user_id'];
                    $redoUndoHistory->budget_id=$input['budget_id'];
                    $redoUndoHistory->envelop_sub_category_id=$input['envelop_sub_category_id'];
                    $redoUndoHistory->total_amount=$input['total_amount'];
                    $redoUndoHistory->budgeted_amount=$input['budgeted_amount'];
                    $redoUndoHistory->weekly_value=$input['weekly_value'];
                    $redoUndoHistory->monthly_value=$input['monthly_value'];
                    $redoUndoHistory->transaction_date=$input['transaction_date'];
                 
                    $redoUndoHistory->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }
         return response()->json(["history"=>$redoUndoHistory,"message"=>__('envelop_goal.history_added_successfully')],200);;

            // return $request;
}


public function getExpensesHistory($budgetID){

 $lastRow = \DB::table('undo_redo_budget_histories')->where(['budget_id'=>$budgetID])->where("user_id","=",getLoggedInUser()->id)->orderBy('id', 'desc')->first();
  if($lastRow){
   return response()->json(["history"=>$lastRow],200);;  
       }else{
     return response(["message"=>__('envelop_goal.no_history_found')],422);
    }
}



public function checkIfUndoOrRedoExists($budgetID){

 $unodes = \DB::table('undo_redo_budget_histories')->where(['budget_id'=>$budgetID])->where("is_undo","=","1")->where("user_id","=",getLoggedInUser()->id)->get();
 $redoes = \DB::table('undo_redo_budget_histories')->where(['budget_id'=>$budgetID])->where("is_undo","=","2")->where("user_id","=",getLoggedInUser()->id)->get();

      return response()->json(["undo_count"=>count($unodes),"redo_count"=>count($redoes)],200);;  
   
}



//  get undo reccord
 public  function getUndoReccord($budgetID)
 {

// undo and redo
 $undoes = \DB::table('undo_redo_budget_histories')->where(['budget_id'=>$budgetID])->where("is_undo","=","1")->where("user_id","=",getLoggedInUser()->id)->get();
 $redoes = \DB::table('undo_redo_budget_histories')->where(['budget_id'=>$budgetID])->where("is_undo","=","2")->where("user_id","=",getLoggedInUser()->id)->get();
 
    $lastRow = \DB::table('undo_redo_budget_histories')->where(['budget_id'=>$budgetID])->where("is_undo","=","1")->where("user_id","=",getLoggedInUser()->id)->orderBy('id', 'desc')->first();
   if($lastRow){
    // updating the reccord for redo
    $undoOrRedoHistory=UndoRedoBudgetHistory::findOrfail($lastRow->id);
    $undoOrRedoHistory->is_undo=2;
    $undoOrRedoHistory->save();
   
   return response()->json(["history"=>$lastRow,"undo_count"=>count($undoes),"redo_count"=>count($redoes)],200);;  
       }else{
     return response(["message"=>__('envelop_goal.no_history_found')],422);
    }
}
  
// get redo reccord
  public function getRedoReccord($budgetID){

// undo and redo
 $undoes = \DB::table('undo_redo_budget_histories')->where(['budget_id'=>$budgetID])->where("is_undo","=","1")->where("user_id","=",getLoggedInUser()->id)->get();
 $redoes = \DB::table('undo_redo_budget_histories')->where(['budget_id'=>$budgetID])->where("is_undo","=","2")->where("user_id","=",getLoggedInUser()->id)->get();
 
  $lastRow = \DB::table('undo_redo_budget_histories')->where(['budget_id'=>$budgetID])->where("is_undo","=","2")->where("user_id","=",getLoggedInUser()->id)->orderBy('id', 'asc')->first();
  if($lastRow){
    // updating the reccord for redo
    $undoOrRedoHistory=UndoRedoBudgetHistory::findOrfail($lastRow->id);
    $undoOrRedoHistory->is_undo=1;
    $undoOrRedoHistory->save();
   
   return response()->json(["history"=>$lastRow,"undo_count"=>count($undoes),"redo_count"=>count($redoes)],200);;  
       }else{
     return response(["message"=>__('envelop_goal.no_history_found')],422);
    }

  }
}
