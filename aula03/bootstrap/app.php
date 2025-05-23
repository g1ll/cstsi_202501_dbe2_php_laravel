<?php

use App\Http\Middleware\ForceJsonResponse;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->appendToGroup("force-json",[ForceJsonResponse::class]);
        // dd($middleware);
        // dd($middleware->getMiddlewareGroups());
        //antes dos middlewares padrões dos laravel
        // $middleware->api(prepend:ForceJsonResponse::class);
        $middleware->api(append:ForceJsonResponse::class);
        // dd($middleware->getMiddlewareGroups());
        $middleware->statefulApi();
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
