<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Omochi\Shop\Domain\Exceptions\NotFoundException;
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
        $response['status'] = 'NG';
        $response['summary'] = '';
        $response['errors'] = '';

        //postでのエラー処理
        if ($exception instanceof CreateException) {
            $response['summary'] = 'Resources create error.';
            $response['errors'] = '登録エラー';
            return response()->json($response, $exception->getCode());
        }

        if ($exception instanceof NotFoundException) {
            $response['summary'] = 'Resources Not found.';
            $response['errors'] = 'Not found';
            return response()->json($response, 404);
        }

        return parent::render($request, $exception);
    }
}
