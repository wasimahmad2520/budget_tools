<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateFormat extends Model
{
    use HasFactory;

       /**
    * 
    * fields that should be hidden
    * */
   protected $hidden = [
        "deleted_at",
        "created_at",
        "updated_at",
    ];
}
