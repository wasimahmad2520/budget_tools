<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
class GeneralController extends Controller
{

public function getApplicationSettings(){


}

// wasim khan my is 

public function appSetting(){

 return response()->json(['settings'=>Settings::all()->where("user_id","=",getLoggedInUser()->id)],200);
}

 public function sideBarBackgroundColor($themName){
   $optionResult=insertOrUpdateOptionValue("sidebar_background_color",$themName);
   if( $optionResult==1){
        return response()->json(["message"=>__('lang.setting_updated_successfull')],200);;
    } else if($optionResult==2){
        return unAuthorizedAction();
        }
   }




 public function sideBarMiniOrFull($sidebarValue){

   $optionResult=insertOrUpdateOptionValue("sidebar_mini",$sidebarValue);
   if( $optionResult==1){
        return response()->json(["message"=>__('lang.setting_updated_successfull')],200);;
    } else if($optionResult==2){
        return unAuthorizedAction();
        }
   }



 public function openLastBudgetAutomatically($lastBudget){
    
   $optionResult=insertOrUpdateOptionValue("open_last_budget_automatically",$lastBudget);
   if( $optionResult==1){
        return response()->json(["message"=>__('lang.setting_updated_successfull')],200);;
    } else if($optionResult==2){
        return unAuthorizedAction();
        }
   }


 public function sideBarActiveColor($sideBarActiveColor){
    
   $optionResult=insertOrUpdateOptionValue("sidebar_active_color",$sideBarActiveColor);
   if( $optionResult==1){
        return response()->json(["message"=>__('lang.setting_updated_successfull')],200);;
    } else if($optionResult==2){
        return unAuthorizedAction();
        }
   }



public function setMyCustomSettingAndOptions($settingKey,$settingValue){

    // return $settingKey;

       $optionResult=insertOrUpdateOptionValue($settingKey,$settingValue);
     if( $optionResult==1){
        return response()->json(["message"=>__('lang.setting_updated_successfull')],200);;
       } else if($optionResult==2){
        return unAuthorizedAction();
        }
}





}
