<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnvelopSubCategory;
use App\Models\Envelop;
use Illuminate\Support\Facades\Validator;
class EnvelopSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
           $validator = Validator::make($request->all(),EnvelopSubCategory::$rules);
           $input=$request->all();
            $envelopSubCategory="";
            if( strlen(EnvelopSubCategory::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>EnvelopSubCategory::validateIfAllRequiredFieldsExist($input)],422);
            }
           // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
            // check if envelopSubCategory already exists for this usr
             if(EnvelopSubCategory::checkEnvelopSubCategoryAlreadyExistsOrNot($input['envelop_sub_category_name'],$input['envelop_id'])>0){
                 return   response()->json(["message"=>__('envelop_sub_category.expenses_already_exists')],422);;
                }
                // adding reccord to database
                 try{
                    $envelopSubCategory=new EnvelopSubCategory;
                    $envelopSubCategory->user_id=$input['user_id'];
                    $envelopSubCategory->envelop_id=$input['envelop_id'];
                    $envelopSubCategory->envelop_sub_category_name=$input['envelop_sub_category_name'];
                    $envelopSubCategory->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }
          
      return response()->json(["envelop_sub_cagetgory"=>$envelopSubCategory,"message"=>__('envelop_sub_category.expenses_added_successfully')],200);;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



          if (!getLoggedInUser()->can('view', EnvelopSubCategory::find($id))) {
                return unAuthorizedAction();
                }
         $envelopSubCategory=EnvelopSubCategory::find($id);
          if (getLoggedInUser()->can('view', $envelopSubCategory)) {
             return response()->json(["envelop_sub_category"=>$envelopSubCategory],200);;
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
       if (getLoggedInUser()->can('update', EnvelopSubCategory::find($id))) {
           $request->request->add(['user_id' => getLoggedInUser()->id]);
           $validator = Validator::make($request->all(),EnvelopSubCategory::$rules);
           $input=$request->all();
            $envelopSubCategory="";
            if( strlen(EnvelopSubCategory::validateIfAllRequiredFieldsExist($input))>0){
              return response(["message"=>EnvelopSubCategory::validateIfAllRequiredFieldsExist($input)],422);
            }
           // check if failed or not
           if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
            // check if envelopSubCategory already exists for this usr
                // adding reccord to database
                 try{
                    $envelopSubCategory= EnvelopSubCategory::find($id);
                    $envelopSubCategory->user_id=$input['user_id'];
                    $envelopSubCategory->envelop_id=$input['envelop_id'];
                    $envelopSubCategory->envelop_sub_category_name=$input['envelop_sub_category_name'];
                    $envelopSubCategory->save();
                }catch(Exception $e){
                return  response()->json($e->getRawMessage(),500);;
                }
             }
          
      return response()->json(["envelop_sub_cagetgory"=>$envelopSubCategory,"message"=>__('envelop_sub_category.expenses_updated_successfully')],200);;

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
       if (getLoggedInUser()->can('delete',EnvelopSubCategory::find($id))) {
             $account=EnvelopSubCategory::destroy($id);

         if($account){
             return response()->json(["message"=>__('envelop_sub_category.expenses_deleted_successfully')],200);;
                 }else{
             return response()->json(["message"=>__('envelop_sub_category.no_expenses_found_with_this_id')],422);;
         }
           }else{
                return unAuthorizedAction();
            }

    }
}
