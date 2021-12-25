<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\API\GeneralController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\EnvelopGoalController;
use App\Http\Controllers\API\EnvelopController;
use App\Http\Controllers\API\UndoRedoController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\AccountController;
use App\Http\Controllers\API\EnvelopGoalTransactionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::resource('products', ProductController::class);
// https://youtu.be/MT-GJQIY3EU



// ApiResouce example https://kitloong.medium.com/create-crud-rest-api-with-laravel-api-resource-3146d91b38b6

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/{id}', [ProductController::class, 'show']);
// Route::get('/products/search/{name}', [ProductController::class, 'search']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    // Route::post('/products', [ProductController::class, 'store']);
    // Route::put('/products/{id}', [ProductController::class, 'update']);
    // Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

//  fetching restricted products
    Route::get('/products', [ProductController::class, 'index']);

// Resoureces CRUD APIs here
   Route::resource('/accounts', API\AccountController::class)->except(['create','edit']);
   Route::get('/accounts/get-budgets-accounts/{budgetID}', [AccountController::class, 'getSpecificBudgetAccounts']);

   Route::resource('/budgets', API\BudgetController::class)->except(['create','edit']);
   
   Route::resource('/envelops', API\EnvelopController::class)->except(['create','edit']);
   Route::get('/envelops/get-envelop-with-children/{budgetID}', [EnvelopController::class, 'getEnvelopsAndChildDataForBudget']);
// transer money from envelop to goal or from  goal to envelop
   Route::resource('/envelopGoalTransactions', API\EnvelopGoalTransactionController::class)->except(['create','edit']);
   Route::get('/envelopGoalTransactions/get-budget-transactions/{budgetID}', [EnvelopGoalTransactionController::class, 'getSpecificBudgetTransactions']);

   Route::resource('/envelopSubCategories', API\EnvelopSubCategoryController::class)->except(['create','edit','index']);
   Route::resource('/envelopsGoals', API\EnvelopGoalController::class)->except(['create','edit','index']);
   Route::resource('/mortgages', API\MortgageController::class)->except(['create','edit']);
   Route::resource('/payees', API\PayeeController::class)->except(['create','edit']);
   Route::resource('/transactions', API\TransactionController::class)->except(['create','edit','show']);
   
// putting history,undo,redo reccord.
   Route::get('/transactions/get-account-transaction/{accountID}', [TransactionController::class, 'getAccountTransactions']);
   // custom setting storing on server
   Route::get('/history/put-expenses-history/', [UndoRedoController::class, 'putExpensesHistory']);
   Route::get('/history/check-if-redo-undo-exists/{budget_id}', [UndoRedoController::class, 'checkIfUndoOrRedoExists']);
   Route::get('/history/undo/get-undo-reccord/{budget_id}', [UndoRedoController::class, 'getUndoReccord']);
   Route::get('/history/redo/get-redo-reccord/{budget_id}', [UndoRedoController::class, 'getRedoReccord']);

// Setting APIs 
    Route::get('/settings/app-setting/', [GeneralController::class, 'appSetting']);
    Route::get('/settings/my-custom-setting/{settingkey}/{settingValue}', [GeneralController::class, 'setMyCustomSettingAndOptions']);
    Route::get('/settings/sidebar-background-color/{theme_name}', [GeneralController::class, 'sideBarBackgroundColor']);
    Route::get('/settings/sidebar-setting/{sidebar_value}', [GeneralController::class, 'sideBarMiniOrFull']);
    Route::get('/settings/open-last-budget/{open_last_budget}', [GeneralController::class, 'openLastBudgetAutomatically']);
    Route::get('/settings/sidebar-active-color/{sidebar_active_color}', [GeneralController::class, 'openLastBudgetAutomatically']);

// report and hom page routes
Route::get('/dashboard/{budgetID}', [HomeController::class, 'dashboard']);
Route::get('/report', [HomeController::class, 'report']);
Route::get('/practice', [HomeController::class, 'practiceData']);



});


// for bad url accessing
Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact wasimahamad2520@gmail.com'], 404);
 });

// ends
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




// used reponse code
// 500 server error
// 200 success
// 422 invalid data or 
// GET /sharks index   sharks.index
// GET /sharks/create  create  sharks.create
// POST    /sharks store   sharks.store
// GET /sharks/{id}    show    sharks.show
// GET /sharks/{id}/edit   edit    sharks.edit
// PUT/PATCH   /sharks/{id}    update  sharks.update
// DELETE


// 404 Not Found (page or other resource doesn’t exist)
// 401 Not authorized (not logged in)
// 403 Logged in but access to requested area is forbidden
// 400 Bad request (something wrong with URL or parameters)
// 422 Unprocessable Entity (validation failed)
// 500 General server error

// 200: OK. The standard success code and default option.
// 201: Object created. Useful for the store actions.
// 204: No content. When an action was executed successfully, but there is no content to return.
// 206: Partial content. Useful when you have to return a paginated list of resources.
// 400: Bad request. The standard option for requests that fail to pass validation.
// 401: Unauthorized. The user needs to be authenticated.
// 403: Forbidden. The user is authenticated, but does not have the permissions to perform an action.
// 404: Not found. This will be returned automatically by Laravel when the resource is not found.
// 500: Internal server error. Ideally you're not going to be explicitly returning this, but if something unexpected breaks, this is what your user is going to receive.
// 503: Service unavailable. Pretty self explanatory, but also another code that is not going to be returned explicitly by the application.





