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

<<<<<<< HEAD
    public function render($request, Throwable $e)
=======
    public function render($request, Throwable $exception)
>>>>>>> 9c11a6f4aea2b1d804bdac7a9cb991697b805bb8
    {
        if ($this->isHttpException($e)) {
            switch ($e->getStatusCode()) {

                // not authorized
                case '401':
                    return \Response::view('error.login',array(),401);
                    break;

                // not found
                case '404':
                    return \Response::view('error.not_found',array(),404);
                    break;

                default:
                    return \Response::view('error.bad_request',array(),500);
                    break;
            }
        } else {
            return parent::render($request, $e);
        }
    }
}
