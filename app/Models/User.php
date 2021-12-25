<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;



      /**
     * Validation rules
     *
     * @var array
     */
     public static $rules = [
        'first_name' => 'required|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|max:255',
        
    ];

      /**
     * Validation rules for login
     *
     * @var array
     */
     public static $rulesForLogin = [
        'email' => 'required|email',
        'password' => 'required|max:255', 
    ];




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'status',
        "deleted_at",
        "created_at",
        "updated_at",
        'remember_token',
    ];

       
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function account(){
        return $this->hasMany(Account::class);
    }

    public function budget(){
     return $this->hasMany(Budget::class);
     }


// validate if the request has enought value

public static function validateIfAllRequiredFieldsExistForSignUp($fields){
          $error="";
//  check if the request has the requied fields
         if(!isset($fields['first_name'])){
           $error=__("lang.please_provide_first_name");
         }

         if(!isset($fields['last_name'])){
           $error=__("lang.please_provide_last_name");
         }

         if(!isset($fields['email'])){
            $error=__("lang.please_provide_email");
         }

         if(!isset($fields['password'])){
         $error= __("lang.please_provide_password");
         }
         return $error;
       }



// validate if the request has enought value
public static function validateIfAllRequiredFieldsExistForLogin($fields){
          $error="";
      //  check if the request has the requied fields
         if(!isset($fields['email'])){
            $error=__("lang.please_provide_email");
         }

         if(!isset($fields['password'])){
         $error= __("lang.please_provide_password");
         }
         return $error;
       }



}
