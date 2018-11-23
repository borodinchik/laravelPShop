<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 11/22/18
 * Time: 1:36 PM
 */

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

trait ExceptionTrait
{
    public function apiResponseException($request, $exception)
    {
        switch ($exception) {
            case $this->isModel($exception):
                return $this->modelResponse($exception);
            case $this->isHttp($exception):
                return $this->httpResponse($exception);
        }
        return parent::render($request, $exception);
    }
    /*Exception function*/
    protected function isModel($exception)
    {
        return $exception instanceof ModelNotFoundException;
    }
    protected function isHttp($exception)
    {
        return $exception instanceof NotFoundHttpException;
    }
    /*Response Function*/
    protected function modelResponse($exception)
    {
        return response()->json([
            'error' => 'Task Model not found'
        ], Response::HTTP_NOT_FOUND);
    }
    protected function httpResponse($exception)
    {
        return response()->json([
            'error' => 'Incorrect route'
        ],Response::HTTP_NOT_FOUND);
    }
}