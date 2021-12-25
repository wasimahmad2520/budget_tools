<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Account extends Model
{
    use HasFactory;



    // Table name
    public $table = 'accounts';


     /**
     * Validation rules
     *
     * @var array
     */
     public static $rules = [
        'account_title' => 'required|max:255',
        'current_amount' => 'required|min:0',
        'account_type_id' => 'required|numeric|min:1',
        'is_account_unlinked' => 'required|numeric|min:1|max:3',
    ];

    public $fillable = [
        'user_id',
        'account_type_id',
        'account_title',
        'current_amount',
        'is_account_unlinked'
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
        'account_type_id' => 'integer',
        'account_title' => 'string',
        'current_amount' => 'double',
        'is_account_unlinked' => 'integer',
       
     ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    // \App\Models\Account::find(1)->accountType;
    public function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }

 public static function checkAccountAlreadyExistsOrNot($accountName){
       $account=Account::all()->where("account_title","=",$accountName)->where("user_id","=",getLoggedInUser()->id);
       if(count($account)>0){
         return count($account);
       }else{
         return 0;
       }

   }

public static function validateIfAllRequiredFieldsExist($fields){
          $error="";
//  check if the request has the requied fields
         if(!isset($fields['account_title'])){
           $error=__("account.please_provide_account_title");
         }
         if(!isset($fields['budget_id'])){
           $error=__("account.please_provide_budget_id");
         }

         if(!isset($fields['current_amount'])){
           $error=__("account.please_provide_account_current_amount");
         }

         if(!isset($fields['account_type_id'])){
           $error=__("account.please_provide_account_type_id");
         }


         return $error;
       }






}
