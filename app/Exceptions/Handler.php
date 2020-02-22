<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException; //この追加を忘れない
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
     
    /*コメントアウトした 
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }
    ここまで
    */
    
    //以下追加
    public function unauthenticated($request, AuthenticationException $exception)
    {
        if($request->expectsJson()){
            return response()->json(['message' => $exception->getMessage()], 401);
        }
 
        if (in_array('admin', $exception->guards())) {
            return redirect()->guest(route('admin.login'));
        }
        
        //return redirect()->action('HomeController@index');
        //return redirect('/');
        return redirect()->guest(route('login')); 
    }
    // ここまで追加
    
}
