<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        HttpException::class,
    ];

    public function report(Exception $e)
    {
        return parent::report($e);
    }

    public function render($request, Exception $e)
    {
      if ($e instanceof ModelNotFoundException) {
        $e = new NotFoundHttpException($e->getMessage(), $e);
      }
      if ($e instanceof NotFoundHttpException) {
        return response(view('errors.404'), 404);
      }
      elseif($e instanceof NotFoundHttpException) {
        return response(view('errors.400'), 400);
      }
      else if($e instanceof NotFoundHttpException) {
        return response(view('errors.401'), 401);
      }
      else if($e instanceof NotFoundHttpException) {
        return response(view('errors.403'), 403);
      }
      else if($e instanceof NotFoundHttpException) {
        return response(view('errors.405'), 405);
      }
      else if($e instanceof NotFoundHttpException) {
        return response(view('errors.408'), 408);
      }
      else if($e instanceof NotFoundHttpException) {
        return response(view('errors.410'), 410);
      }
      else if($e instanceof NotFoundHttpException) {
        return response(view('errors.500'), 500);
      }
      else if($e instanceof NotFoundHttpException) {
        return response(view('errors.503'), 503);
      }
      return parent::render($request, $e);
    }

}
