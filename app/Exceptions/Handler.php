<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });


      $this->renderable(function (NotFoundHttpException $e, $request) {
        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'Record not found.'
            ], 404);
        }
    });  

      $this->renderable(function (ModelNotFoundException $e, $request) {
      
            return response()->json([
                'message' => 'Resource Not Found Exception !'
            ], 404);
        
    });




      $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
      
            return response()->json([
                'message' => 'Method Not Supported Exception  !'
            ], 405);
        
    });

      
      $this->renderable(function (RouteNotFoundException $e, $request) {
      
            return response()->json([
                'message' => 'No Route Found Exception  !'
            ], 405);
        
    });


    }





// 






}
