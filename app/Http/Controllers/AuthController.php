<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Events\EventUserRegistered;
use App\Events\EventUserLoggedIn;
class AuthController extends Controller
{

    public function register(Request $request)
    {
         $validator = Validator::make($request->all(),User::$rules);
         $input=$request->all();

     //  check if the request has the requied fields
      if( strlen(User::validateIfAllRequiredFieldsExistForSignUp($input))>0){
        return response(["message"=>User::validateIfAllRequiredFieldsExistForSignUp($input)],422);
      }
      // check if the validation failed or passed
        if ($validator->fails()) {
             return  response()->json($validator->messages(),422);;
             }else{
            $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']) 
              ]);
             }

       // create api token for the user
        $token = $user->createToken('myapptoken')->plainTextToken;
        // best way for returning data
        $response = ['user' => $user, 'token' => $token];
         event(new EventUserRegistered($user)); // dispatch event from here
         event(new EventUserRegistered($user)); 
        return response($response, 200);
    }

    public function login(Request $request)
    {

         $validator = Validator::make($request->all(),User::$rulesForLogin);
         $input=$request->all();
          //  check if the request has the requied fields
      if( strlen(User::validateIfAllRequiredFieldsExistForLogin($input))>0){
        return response(["message"=>User::validateIfAllRequiredFieldsExistForLogin($input)],422);
      }

    if ($validator->fails()) {
       return  response()->json($validator->messages(),422);
      }else{

      // Check email
        $user = User::where('email', $input['email'])->first();

        // Check password
        if (!$user || !Hash::check($input['password'], $user->password))
        {
            // abort(404);
            return response(['message' => __("auth.wrong_credentials")], 422);
            // return  response()->json(['message' => __("auth.wrong_credentials")], 401);  same result
        }
        $token = $user->createToken('myapptoken')->plainTextToken;
        $newUser = User::find($user->id);
        $response = ["message"=>__("auth.logged_in_successfully"),'user' => $user, 'token' => $token];
        // saving token to databasee
        $newUser->remember_token = $token;
        $newUser->save();
    
        event(new EventUserLoggedIn($newUser)); // dispatch event from here
      }

        // saving ends
        return response($response, 200);
    }

    public function logout(Request $request)
    {
        auth()->user()
            ->tokens()
            ->delete();
        return ['message' => __('auth.logged_out_successfully')];
    }
}

