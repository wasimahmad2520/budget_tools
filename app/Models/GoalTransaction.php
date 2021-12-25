<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalTransaction extends Model
{
    use HasFactory;


      // Table name
    public $table = 'goal_transactions';


     /**
     * Validation rules
     *
     * @var array
     */
     public static $rules = [
      
        'is_from_envelop_to_goal' => 'required|numeric|min:1',
        'total_amount' => 'required|numeric|min:1',
        'budget_id' => 'required|numeric|min:1'
       
    ];

    public $fillable = [
        'user_id',
        'is_from_envelop_to_goal',
        'total_amount',
        'budget_id'
      ];

   /**
    * 
    * fields that should be hidden
    * */
   protected $hidden = [
        "deleted_at",
        "created_at",
        "updated_at",
    ];




public static function validateIfAllRequiredFieldsExist($fields){
          $error="";
//  check if the request has the requied fields
         if(!isset($fields['budget_id'])){
           $error=__("envelop_goal_transaction.please_provide_budget_id");
         }
         if(!isset($fields['is_from_envelop_to_goal'])){
           $error=__("envelop_goal_transaction.please_provide_budget_id");
         }

       


         return $error;
       }







}
