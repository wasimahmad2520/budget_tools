<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payee extends Model
{
    use HasFactory;
           // Table name
    public $table = 'payees';


     /**
     * Validation rules
     *
     * @var array
     */
     public static $rules = [
        'payee_name' => 'required|max:255',
        'user_id' => 'required|min:1'
    ];

     public $fillable = [
        'user_id',
        'payee_name'
      ];

   /**
    * 
    * fields that should be hidden
    * */
  protected $hidden = [
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
        'payee_name' => 'string'
       
    ];



public static function validateIfAllRequiredFieldsExist($fields){
          $error="";
//  check if the request has the requied fields
         if(!isset($fields['payee_name'])){
           $error=__("payee.please_provide_name");
         }
        
         return $error;
       }

  public static function checkPayeeAlreadyExistsOrNot($payeeName){
       $payee=Payee::all()->where("payee_name","=",$payeeName)->where("user_id","=",getLoggedInUser()->id);
       if(count($payee)>0){
         return count($payee);
       }else{
         return 0;
       }

     
    }
}
