<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ExceptionJsonResponse;
use Exception;

class Controller
{
    protected function errorHandler(string $message, Exception $error, int $statusCode = 500): \Illuminate\Http\JsonResponse
    {
        throw new ExceptionJsonResponse(
            previous: $error,
            message: $message,
            code: $statusCode
        );
    }
}
