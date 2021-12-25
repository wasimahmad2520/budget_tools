<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvelopSubCategory extends Model
{
    use HasFactory;

   // Table name
    public $table = 'envelop_sub_categories';


     /**
     * Validation rules
     *
     * @var array
     */
     public static $rules = [
        'user_id' => 'required|min:1',
        'envelop_id' => 'required|min:1',
        'envelop_sub_category_name' => 'required|max:255'
    ];

     public $fillable = [
        'user_id',
        'envelop_id',
        'envelop_sub_category_name'
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
        'envelop_id' => 'integer',
        'envelop_sub_category_name' => 'string',
        'total_budget' => 'double'
    ];

public static function checkEnvelopSubCategoryAlreadyExistsOrNot($envelopSubCategoryName,$envelopID){
       $envelopSubCategory=EnvelopSubCategory::all()->where("envelop_sub_category_name","=",$envelopSubCategoryName)->where("user_id","=",getLoggedInUser()->id)->where("envelop_id","=",$envelopID);
       if(count($envelopSubCategory)>0){
         return count($envelopSubCategory);
       }else{
         return 0;
       }

   }

public static function validateIfAllRequiredFieldsExist($fields){
          $error="";
//  check if the request has the requied fields
         if(!isset($fields['envelop_sub_category_name'])){
           $error=__("envelop_sub_category.please_provide_name");
         }
         if(!isset($fields['envelop_id'])){
           $error=__("envelop_sub_category.please_provide_envelop_id");
         }
         return $error;
       }





}
