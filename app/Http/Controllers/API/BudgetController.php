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

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response()->json([
        'currencies'=>Currency::all(),
        'number_formats'=>NumberFormat::All(),
        'date_formats'=>DateFormat::All()
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
           $request->request->add(['user_id' => getLoggedInUser()->id]);
           $validator = Validator::make($request->all(),Budget::$rules);
           $input=$request->all();
           $budget="";
            if( strlen(Budget::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>Budget::validateIfAllRequiredFieldsExist($input)],422);
            }
           // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
             // check if budget already exists for this usr
                if(Budget::checkBudgetAlreadyExistsOrNot($input['budget_name'])>0){
                 return   response()->json(["message"=>__('budget.budget_already_exists')],422);;
                }
              // return $request;
                try{
                    $budget=new Budget;
                    $budget->user_id=$input['user_id'];
                    $budget->currency_id=$input['currency_id'];
                    $budget->date_format_id=$input['date_format_id'];
                    $budget->number_format_id=$input['number_format_id'];
                    $budget->budget_name=$input['budget_name'];
                    $budget->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
      
             
             }
             if($budget){
                  event(new EventBudgetCreated($budget)); 
             }
         
         return response()->json(["budget"=>$budget,"message"=>__('budget.budget_added_successfully')],200);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

          if (!getLoggedInUser()->can('view', Budget::find($id))) {
                return unAuthorizedAction();
                }
        $budget=Budget::find($id);
        if($budget){
          return response()->json(["budget"=>$budget],200);;
        }else{
        return response()->json(["message"=>__('lang.no_budget_found_with_this_id')],422);;
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

           $request->request->add(['user_id' => getLoggedInUser()->id]);
           $validator = Validator::make($request->all(),Budget::$rules);
           $input=$request->all();
           $budget="";
            
           // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
             // check if budget already exists for this usr
                if(Budget::checkBudgetAlreadyExistsOrNot($input['budget_name'])>0){
                 return   response()->json(["message"=>__('budget.budget_already_exists')],422);;
                }
              // return $request;
                try{
                    $budget=Budget::find($id);
                    $budget->user_id=$input['user_id'];
                    $budget->currency_id=$input['currency_id'];
                    $budget->date_format_id=$input['date_format_id'];
                    $budget->number_format_id=$input['number_format_id'];
                    $budget->budget_name=$input['budget_name'];
                    $budget->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }
         return response()->json(["budget"=>$budget,"message"=>__('budget.budget_updated_successfully')],200);;
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
     if (getLoggedInUser()->can('delete',Budget::find($id))) {
             $budget=Budget::destroy($id);

         if($budget){
             return response()->json(["message"=>__('budget.budget_deleted_successfully')],200);;
                 }else{
            return response()->json(["message"=>__('budget.no_budget_found_with_this_id')],422);;
         }
       }else{
        return unAuthorizedAction();
       }
        

    }
}
