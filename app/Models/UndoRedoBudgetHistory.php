<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UndoRedoBudgetHistory extends Model
{
    use HasFactory;



    // Table name
    public $table = 'undo_redo_budget_histories';
     /**
     * Validation rules
     *
     * @var array
     */
     public static $rules = [
        'user_id' => 'required|min:1',
        'envelop_sub_category_id' => 'required|min:1',
        'total_amount' => 'required|numeric|min:0',
        'budgeted_amount' => 'required|numeric|min:0',
        'duration_type' => 'required',
    ];

     public $fillable = [
        'user_id',
        'envelop_sub_category_id',
        'total_amount',
        'budgeted_amount',
        // 'is_undo',
        'duration_type'
      ];

   /**
    * 
    * fields that should be hidden
    * */
  protected $hidden = [
        
        "created_at",
        "updated_at",
    ];

public static function validateIfAllRequiredFieldsExistForPutHistory($fields){
          $error="";

//  check if the request has the requied fields
         // if(!isset($fields['duration_type'])){
         //   $error=__("envelop_goal.please_provide_duration_type");
         // }
         if(!isset($fields['total_amount'])){
           $error=__("envelop_goal.please_provide_total_amount");
         }

         if(!isset($fields['budget_id'])){
           $error=__("envelop_goal.please_provide_budget_id");
         }

         if(!isset($fields['budgeted_amount'])){
           $error=__("envelop_goal.please_provide_budgeted_amount");
         }

         if(!isset($fields['envelop_sub_category_id'])){
           $error=__("envelop_goal.please_provide_expenses_category_id");
         }


         return $error;
       }

}
