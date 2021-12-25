<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvelopGoal extends Model
{
    use HasFactory;

       // Table name
    public $table = 'envelop_goals';
     /**
     * Validation rules
     *
     * @var array
     */
     public static $rules = [
        'user_id' => 'required|min:1',
        'envelop_sub_category_id' => 'required|min:1',
        'total_amount' => 'required|numeric|min:0',
        'duration_type' => 'required',
    ];

     public $fillable = [
        'user_id',
        'envelop_sub_category_id',
        'total_amount',
        'duration_type'
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
        'envelop_sub_category_id' => 'integer',
        'total_amount' => 'double',
        'duration_type' => 'string',
       
    ];


public static function validateIfAllRequiredFieldsExist($fields){
          $error="";
//  check if the request has the requied fields
         if(!isset($fields['duration_type'])){
           $error=__("envelop_goal.please_provide_duration_type");
         }
         if(!isset($fields['total_amount'])){
           $error=__("envelop_goal.please_provide_total_amount");
         }


         return $error;
       }




 // public static function checkAccountAlreadyExistsOrNot($accountName){
 //       $account=Envelo::all()->where("account_title","=",$accountName)->where("user_id","=",getLoggedInUser()->id);
 //       if(count($account)>0){
 //         return count($account);
 //       }else{
 //         return 0;
 //       }

 //   }

}
