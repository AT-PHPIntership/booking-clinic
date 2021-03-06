<?php

namespace App\Exceptions;

use Exception;
use Request;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;

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
     * @param \Exception $exception exception
     *
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request   request
     * @param \Exception               $exception exception
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->isJson() && $exception instanceof ValidationException) {
            return $this->invalidJson($request, $exception);
        }
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param \Illuminate\Http\Request                 $request   request
     * @param \Illuminate\Auth\AuthenticationException $exception exception
     *
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        $guard = array_get($exception->guards(), 0);
        switch ($guard) {
            case 'web-admin':
                $pathToRedirect = 'admin.login';
                break;
            default:
                $pathToRedirect = 'login';
                break;
        }
        return $request->expectsJson()
                ? response()->json(['message' => $exception->getMessage()], Response::HTTP_UNAUTHORIZED)
                : redirect()->guest(route($pathToRedirect));
    }

    /**
     * Convert a validation exception into a JSON response.
     *
     * @param \Illuminate\Http\Request                   $request   request
     * @param \Illuminate\Validation\ValidationException $exception validation exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        return response()->json([
                        'message' => $exception->getMessage(),
                        'errors' => $exception->errors(),
                        'code' => $exception->status,
                        'request' => $request->all(),
                    ], $exception->status);
    }
}
