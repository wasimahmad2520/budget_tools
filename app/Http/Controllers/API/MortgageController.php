<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mortgage;
use Illuminate\Support\Facades\Validator;
class MortgageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['mortgages'=>Mortgage::select('id', 'mortgage_name','amount','start_date','end_date')->where("user_id","=",getLoggedInUser()->id)->get()]);
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
           $validator = Validator::make($request->all(),Mortgage::$rules);
           // return $request;
           $input=$request->all();
            $mortgage="";
            if( strlen(Mortgage::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>Mortgage::validateIfAllRequiredFieldsExist($input)],422);
            }
           // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
            // check if mortgage already exists for this usr
             if(Mortgage::checkMortGageAlreadyExistsOrNot($input['mortgage_name'])>0){
                 return   response()->json(["message"=>__('mortgage.mortgage_already_exists')],422);;
                }
                // adding reccord to database
                 try{
                    $mortgage=new Mortgage;
                    $mortgage->user_id=$input['user_id'];
                    $mortgage->mortgage_name=$input['mortgage_name'];
                    $mortgage->amount=$input['amount'];
                    $mortgage->start_date=$input['start_date'];
                    $mortgage->end_date=$input['end_date'];
                    $mortgage->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }
          
      return response()->json(["mortgage"=>$mortgage,"message"=>__('mortgage.mortgage_added_successfully')],200);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          if (!getLoggedInUser()->can('view', Mortgage::find($id))) {
                return unAuthorizedAction();
                }
           $mortgage=Mortgage::find($id);
          if (getLoggedInUser()->can('view', $mortgage)) {
             return response()->json(["mortgage"=>$mortgage],200);;
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
          if (getLoggedInUser()->can('update', Mortgage::find($id))) {
           $request->request->add(['user_id' => getLoggedInUser()->id]);
           $validator = Validator::make($request->all(),Mortgage::$rules);
           // return $request;
           $input=$request->all();
            $mortgage="";
            if( strlen(Mortgage::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>Mortgage::validateIfAllRequiredFieldsExist($input)],422);
            }
           // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
            // check if mortgage already exists for this usr
             // if(Mortgage::checkMortGageAlreadyExistsOrNot($input['mortgage_name'])>0){
             //     return   response()->json(["message"=>[__('mortgage.mortgage_already_exists')]],422);;
             //    }
                // adding reccord to database
                 try{
                    $mortgage=Mortgage::find($id);
                    $mortgage->user_id=$input['user_id'];
                    $mortgage->mortgage_name=$input['mortgage_name'];
                    $mortgage->amount=$input['amount'];
                    $mortgage->start_date=$input['start_date'];
                    $mortgage->end_date=$input['end_date'];
                    $mortgage->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }
          
      return response()->json(["mortgage"=>$mortgage,"message"=>__('mortgage.mortgage_updated_successfully')],200);;
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
    
     
     if (getLoggedInUser()->can('delete',Mortgage::find($id))) {
                $account=Mortgage::destroy($id);
         if($account){
                return response()->json(["message"=>__('mortgage.mortgage_deleted_successfully')],200);;
                 }
           }else{
                return unAuthorizedAction();
            }
    }
}
