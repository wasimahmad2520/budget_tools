<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;


// Table name
    public $table = 'account_types';


     /**
     * Validation rules
     *
     * @var array
     */
     public static $rules = [
        'accoutn_type_name' => 'required|max:255'
    ];

     public $fillable = [
        'accoutn_type_name'
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

// \App\Models\AccountType::find(1)->account;
public function account(){
   return $this->hasMany(Account::class);
}



}
