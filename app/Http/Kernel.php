<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    

    protected $routeMiddleware = [
        
        'jwt.verify' => \App\Http\Middleware\JwtMiddleware::class,
    ];
}