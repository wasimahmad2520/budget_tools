<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Payee;

class PayeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['accounts'=>Payee::select('id', 'payee_name')->where("user_id","=",getLoggedInUser()->id)->get()]);
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
           $validator = Validator::make($request->all(),Payee::$rules);
           $input=$request->all();
            $payee="";
            if( strlen(Payee::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>Payee::validateIfAllRequiredFieldsExist($input)],422);
            }
           // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
            // check if payee already exists for this usr
             if(Payee::checkPayeeAlreadyExistsOrNot($input['payee_name'])>0){
                 return   response()->json(["message"=>__('payee.payee_already_exists')],422);;
                }
                // adding reccord to database
                 try{
                    $payee=new Payee;
                    $payee->user_id=$input['user_id'];
                    $payee->payee_name=$input['payee_name'];
                   
                    $payee->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }
          
      return response()->json(["payee"=>$payee,"message"=>__('payee.payee_added_successfully')],200);;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

          if (!getLoggedInUser()->can('view', Payee::find($id))) {
                return unAuthorizedAction();
                }
           $payee=Payee::find($id);
          if (getLoggedInUser()->can('view', $payee)) {
             return response()->json(["payee"=>$payee],200);;
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

          if (getLoggedInUser()->can('update', Payee::find($id))) {
           $request->request->add(['user_id' => getLoggedInUser()->id]);
           $validator = Validator::make($request->all(),Payee::$rules);
           $input=$request->all();
            $payee="";
            if( strlen(Payee::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>Payee::validateIfAllRequiredFieldsExist($input)],422);
            }
           // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
           
                // adding reccord to database
                 try{
                    $payee=new Payee;
                    $payee->user_id=$input['user_id'];
                    $payee->payee_name=$input['payee_name'];
                   
                    $payee->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }
          
      return response()->json(["payee"=>$payee,"message"=>__('payee.payee_added_successfully')],200);;

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
        
     if (getLoggedInUser()->can('delete',Payee::find($id))) {
             $account=Payee::destroy($id);

         if($account){
             return response()->json(["message"=>__('payee.payee_deleted_successfully')],200);;
                 }else{
             return response()->json(["message"=>__('payee.no_payee_found_with_this_id')],422);;
         }
           }else{
                return unAuthorizedAction();
            }
    }
}
