<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;



    // Table name
    public $table = 'budgets';


     /**
     * Validation rules
     *
     * @var array
     */
     public static $rules = [
       
        'currency_id' => 'required|numeric|min:0',
        'number_format_id' => 'required|numeric|min:0',
        'budget_name' => 'required|max:255'
    ];

     public $fillable = [
        'user_id',
        'currency_id',
        'number_format_id',
        'budget_name'
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
        'currency_id' => 'integer',
        'number_format_id' => 'integer',
        'budget_name' => 'string'
       
    ];



    public function user(){
       return $this->belongsTo(User::class);
    }
    public function currency(){
       return $this->belongsTo(Currency::class);
    }
    public function dateFormat(){
       return $this->belongsTo(DateFormat::class);
    }




public static function validateIfAllRequiredFieldsExist($fields){
          $error="";
//  check if the request has the requied fields
         if(!isset($fields['currency_id'])){
           $error=__("budget.please_select_currency");
         }

         if(!isset($fields['date_format_id'])){
           $error=__("budget.please_select_date_format");
         }

         if(!isset($fields['number_format_id'])){
            $error=__("budget.please_select_number_format");
         }

         if(!isset($fields['budget_name'])){
         $error= __("budget.please_provide_budget_name");
         }
         return $error;
       }






    public static function checkBudgetAlreadyExistsOrNot($budgetName){
       $budget=Budget::all()->where("budget_name","=",$budgetName)->where("user_id","=",getLoggedInUser()->id);
       if(count($budget)>0){
         return count($budget);
       }else{
         return 0;
       }

     
    }

}
