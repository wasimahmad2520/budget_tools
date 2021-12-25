<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;






   // Table name
    public $table = 'transactions';


     /**
     * Validation rules
     *
     * @var array
     */
     public static $rulesEnvelop = [
        'account_id' => 'required|numeric|min:0',
        'envelop_id' => 'required|numeric|min:0',
        'envelop_sub_cat_id' => 'required|numeric|min:0'
    ];

     public static $rulesMortgage = [
         'account_id' => 'required|numeric|min:0'
        // 'mortgage_id ' => 'required|numeric|min:0'
       
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


     /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'mortgage_id' => 'integer',
        'envelop_id' => 'integer',
        'envelop_sub_cat_id' => 'integer'
       
    ];


public static function validateIfAllRequiredFieldsExistForEnvelop($fields){
          $error="";
//  check if the request has the requied fields
         if(!isset($fields['envelop_id'])){
           $error=__("transaction.please_provide_envelop_id");
         }

         if(!isset($fields['envelop_sub_cat_id'])){
           $error=__("transaction.please_provide_envelop_sub_cat_id");
           }

         if(!isset($fields['in_flow_amount'])){
           $error=__("transaction.please_provide_in_flow_amount");
           }

         if(!isset($fields['out_flow_amount'])){
           $error=__("transaction.please_provide_out_flow_amount");
           }

         if(!isset($fields['account_id'])){
           $error=__("transaction.please_provide_account_id");
           }
         return $error;
       }


public static function validateIfAllRequiredFieldsExistForMortgage($fields){
          $error="";
//  check if the request has the requied fields
         if(!isset($fields['mortgage_id'])){
           $error=__("transaction.please_provide_mortgage_id");
          }

        if(!isset($fields['in_flow_amount'])){
           $error=__("transaction.please_provide_in_flow_amount");
           }
           
         if(!isset($fields['out_flow_amount'])){
           $error=__("transaction.please_provide_out_flow_amount");
           }


         if(!isset($fields['account_id'])){
           $error=__("transaction.please_provide_account_id");
           }

         return $error;
        }


}
