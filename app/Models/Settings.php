<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;



  public $fillable = [
        'user_id',
        'option_name',
        'option_value'
      ];

   /**
    * 
    * fields that should be hidden
    * */
   protected $hidden = [
        
        "created_at",
        "updated_at",
    ];

}
