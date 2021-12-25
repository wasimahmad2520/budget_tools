<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envelop extends Model
{
    use HasFactory;

        // Table name
    public $table = 'envelops';


     /**
     * Validation rules
     *
     * @var array
     */
     public static $rules = [
        'name' => 'required|max:255',
        'user_id' => 'required|min:1'
    ];

     public $fillable = [
        'user_id',
        'name'
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
        'name' => 'string'
       
    ];



public static function validateIfAllRequiredFieldsExist($fields){
          $error="";
//  check if the request has the requied fields
         if(!isset($fields['name'])){
           $error=__("envelop.please_provide_name");
         }
         if(!isset($fields['budget_id'])){
           $error=__("envelop.please_provide_provide_budget_id");
         }

    
         return $error;
       }

  public static function checkEnvelopAlreadyExistsOrNot($envelopName){
       $envelop=Envelop::all()->where("name","=",$envelopName)->where("user_id","=",getLoggedInUser()->id);
       if(count($envelop)>0){
         return count($envelop);
       }else{
         return 0;
       }

     
    }



}
