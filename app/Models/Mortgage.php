<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mortgage extends Model
{
    use HasFactory;


   // Table name
    public $table = 'mortgages';


     /**
     * Validation rules
     *
     * @var array
     */
     public static $rules = [
        'user_id' => 'required|min:1',
        'mortgage_name' => 'required|max:255',
        'start_date' => 'required|max:12',
        'end_date' => 'required|max:12',
        'amount' => 'required|numeric|min:0'
    ];

     public $fillable = [
        'user_id',
        'mortgage_name',
        'start_date',
        'end_date',
        'amount'];

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
        'mortgage_name' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'amount' => 'double'
    ];


 public static function checkMortGageAlreadyExistsOrNot($mortgageName){
       $account=Mortgage::all()->where("mortgage_name","=",$mortgageName)->where("user_id","=",getLoggedInUser()->id);
       if(count($account)>0){
         return count($account);
       }else{
         return 0;
       }

   }

public static function validateIfAllRequiredFieldsExist($fields){
          $error="";
//  check if the request has the requied fields
         if(!isset($fields['mortgage_name'])){
           $error=__("mortgage.please_provide_provide_mortgage_name");
         }
         if(!isset($fields['amount'])){
           $error=__("mortgage.please_provide_total_amount");
         }
         if(!isset($fields['start_date'])){
           $error=__("mortgage.please_provide_provide_start_date");
         }
         if(!isset($fields['end_date'])){
           $error=__("mortgage.please_provide_provide_end_date");
         }


         return $error;
       }




}
