<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
    }

    // public function render($request, Exception $e)
    // {
    //     if ($e instanceof ModelNotFoundException) {
    //         $e = new NotFoundHttpException($e->getMessage(), $e);
    //     }

    //     if ($e instanceof TokenMismatchException) {

    //         return redirect()->route('login')->with('message', 'You page session expired. Please try again');
    //     }

    //     return parent::render($request, $e);
    // }
}
