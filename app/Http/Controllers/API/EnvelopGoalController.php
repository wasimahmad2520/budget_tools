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
class EnvelopGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
           $validator = Validator::make($request->all(),EnvelopGoal::$rules);
           // if the request does not have hte value
           if(!$request->has("weekly_value")){
               $request->request->add(['weekly_value' => NULL]);
           }
           if(!$request->has("monthly_value")){
               $request->request->add(['monthly_value' => NULL]);
           }
            // return $request;
           $input=$request->all();
            if( strlen(EnvelopGoal::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>EnvelopGoal::validateIfAllRequiredFieldsExist($input)],422);
            }

            $envelopGoal="";
        // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
           
                // adding reccord to database
                 try{
                    $envelopGoal=new EnvelopGoal;
                    $envelopGoal->user_id=$input['user_id'];
                    $envelopGoal->total_amount=$input['total_amount'];
                    $envelopGoal->duration_type=$input['duration_type'];
                    $envelopGoal->envelop_sub_category_id=$input['envelop_sub_category_id'];
                    $envelopGoal->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }


      return response()->json(["envelop_goal"=>$envelopGoal,"message"=>__('envelop_goal.envelop_goal_added_successfully')],200);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          if (!getLoggedInUser()->can('view', EnvelopGoal::find($id))) {
                return unAuthorizedAction();
                }

          $envelopGoal=EnvelopGoal::find($id);
          if (getLoggedInUser()->can('view', $envelopGoal)) {
              return response()->json(['evenlop_goal'=>EnvelopGoal::select('id', 'total_amount','duration_type','weekly_value','monthly_value','transaction_date')->where("user_id","=",getLoggedInUser()->id)->where("id","=",$id)->get()]);
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
           

           if (getLoggedInUser()->can('update', EnvelopGoal::find($id))) {
           $request->request->add(['user_id' => getLoggedInUser()->id]);
           $validator = Validator::make($request->all(),EnvelopGoal::$rules);
           // if the request does not have hte value
           if(!$request->has("weekly_value")){
               $request->request->add(['weekly_value' => NULL]);
           }
           if(!$request->has("monthly_value")){
               $request->request->add(['monthly_value' => NULL]);
           }
            // return $request;
           $input=$request->all();
            if( strlen(EnvelopGoal::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>EnvelopGoal::validateIfAllRequiredFieldsExist($input)],422);
            }

            $envelopGoal="";
        // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
           
                // adding reccord to database
                 try{
                    $envelopGoal=EnvelopGoal::find($id);
                    $envelopGoal->user_id=$input['user_id'];
                    $envelopGoal->total_amount=$input['total_amount'];
                    $envelopGoal->duration_type=$input['duration_type'];
                    $envelopGoal->envelop_sub_category_id=$input['envelop_sub_category_id'];
                    $envelopGoal->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }
         return response()->json(["envelop_goal"=>$envelopGoal,"message"=>__('envelop_goal.envelop_goal_updated_successfully')],200);;
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
         if (getLoggedInUser()->can('delete',EnvelopGoal::find($id))) {
             $envelopGoal=EnvelopGoal::destroy($id);

         if($envelopGoal){
             return response()->json(["message"=>__('envelop_goal.envelop_goal_deleted_successfully')],200);;
                 }else{
             return response()->json(["message"=>__('envelop_goal.no_envelop_goal_found_with_this_id')],422);;
         }
           }else{
                return unAuthorizedAction();
            }
    }




}
