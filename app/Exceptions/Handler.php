<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
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

    /**
     * @param Throwable $exception
     * @return mixed|void
     * @throws Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Throwable $e
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($e, $request);
        }
        if ($e instanceof ModelNotFoundException) {
            $model = class_basename($e->getModel());
            return $this->errorResponse("{$model} not found", 404);
        }
        if ($e instanceof AuthenticationException) {
            return $this->unauthenticated($request, $e);
        }
        if ($e instanceof AuthorizationException) {
            return $this->errorResponse($e->getMessage(), 403);
        }
        if ($e instanceof NotFoundHttpException) {
            return $this->errorResponse('URL not found', 404);
        }
        if ($e instanceof MethodNotAllowedException) {
            return $this->errorResponse('Method not allowed for this URL', 405);
        }
        if ($e instanceof HttpException) {
            return $this->errorResponse($e->getMessage(), $e->getStatusCode());
        }
        if ($e instanceof QueryException) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                return $this->errorResponse('Cannot remove this resource. It is related with any other resource', 409);
            }
        }

        if (config('app.debug')) {
            return parent::render($request, $e);
        }
        return $this->errorResponse('Internal server error. Try again later', 500);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException $exception
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return str_contains($request->getPathInfo(), '/api/')
            ? $this->errorResponse('Unauthorized client.', 401)
            : redirect()->guest($exception->redirectTo() ?? route('login'));
    }

    /**
     * @param ValidationException $e
     * @param \Illuminate\Http\Request $request
     * @return bool|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response|null
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        if ($e->response) {
            return $e->response;
        }

        return str_contains($request->getPathInfo(), '/api/')
            ? $this->errorResponse($e->validator->errors()->getMessages(), 400)
            : $this->invalid($request, $e);
    }
}
