<?php

namespace App\Listeners;

use App\Events\EventUserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Settings;
use App\Models\User;
class ListenerUserRegistered
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EventUserRegistered  $event
     * @return void
     */
    public function handle(EventUserRegistered $event)
    {
        //code here for new user registered event
         
         // side bar background color setting
         $sideBarBackgroundColorSetting=Settings::all()->where("user_id","=",$event->user->id)->where("option_name","=","sidebar_background_color");
         if(count($sideBarBackgroundColorSetting)==0){
          Settings::create([
          'user_id'=>$event->user->id,
          'option_name'=>'sidebar_background_color',
          'option_value'=>'#f5f5f5',
                        ]);
                                      }  

         // side bar active color setting
         $sideBarActiveColorSetting=Settings::all()->where("user_id","=",$event->user->id)->where("option_name","=","sidebar_active_color");
         if(count($sideBarActiveColorSetting)==0){
          Settings::create([
          'user_id'=>$event->user->id,
          'option_name'=>'sidebar_active_color',
          'option_value'=>'#6bd098',
                        ]);
                                             } 

         // side bar active color setting
         $sideBarMiniOrNotSetting=Settings::all()->where("user_id","=",$event->user->id)->where("option_name","=","sidebar_mini");
         if(count($sideBarMiniOrNotSetting)==0){
          Settings::create([
          'user_id'=>$event->user->id,
          'option_name'=>'sidebar_mini',
          'option_value'=>'0',
                      ]);
                                      }
           // budget  setting
          // open last budget automatically
         $setting=Settings::all()->where("user_id","=",$event->user->id)->where("option_name","=","open_last_budget_automatically");
         if(count($setting)==0){
          Settings::create([
          'user_id'=>$event->user->id,
          'option_name'=>'open_last_budget_automatically',
          'option_value'=>'1',
                      ]);
                               }

    // budget  date format
         // $settingBudgetDateFormat=Settings::all()->where("user_id","=",$event->user->id)->where("option_name","=","budget_date_format");
         // if(count($settingBudgetDateFormat)==0){
         //  Settings::create([
         //  'user_id'=>$event->user->id,
         //  'option_name'=>'budget_date_format',
         //  'option_value'=>'1',
         //              ]);
         //                     }
          // budget  number format
         // $setting=Settings::all()->where("user_id","=",$event->user->id)->where("option_name","=","budget_number_format");
         // if(count($setting)==0){
         //  Settings::create([
         //  'user_id'=>$event->user->id,
         //  'option_name'=>'budget_number_format',
         //  'option_value'=>'1',
         //              ]);
         //                     }
          // budget  currency symbol replacement
         // $setting=Settings::all()->where("user_id","=",$event->user->id)->where("option_name","=","budget_currency_symbol_replacement");
         // if(count($setting)==0){
         //  Settings::create([
         //  'user_id'=>$event->user->id,
         //  'option_name'=>'budget_currency_symbol_replacement',
         //  'option_value'=>'1',
         //              ]);
         //                   }

          // budget default currency format
         // $setting=Settings::all()->where("user_id","=",$event->user->id)->where("option_name","=","budget_default_currency");
         // if(count($setting)==0){
         //  Settings::create([
         //  'user_id'=>$event->user->id,
         //  'option_name'=>'budget_default_currency',
         //  'option_value'=>'1',
         //              ]);
         //                       }






                                                     
         

         // echo "the new user is ".$event->user->first_name;
    }
}
