<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenBlackListedException;


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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    { 
        if($exception instanceof TokenBlackListedException){
            return response()->json(
                ['error' => 'Token can not be used get new one'], 400
            );
        } elseif ($exception instanceof TokenInvalidException) {
            return response()->json(
                ['error' => 'Token is invalid'], 400
            );
        } elseif ($exception instanceof TokenExpiredException) {
            return response()->json(
                ['error' => 'Token is expired'], 400
            );
        } elseif ($exception instanceof JWTException) {
            return response()->json(
                ['error' => 'Token is not provided'], 400
            );
        } 
        
        return parent::render($request, $exception);
    }
}
