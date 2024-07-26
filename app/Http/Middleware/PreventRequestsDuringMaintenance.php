<?php 
// app/Http/Middleware/PreventRequestsDuringMaintenance.php
namespace App\Http\Middleware;

use Closure;

class PreventRequestsDuringMaintenance
{
    public function handle($request, Closure $next)
    {
        if (app()->isDownForMaintenance()) {
            return response('Be right back!', 503);
        }

        return $next($request);
    }
}
