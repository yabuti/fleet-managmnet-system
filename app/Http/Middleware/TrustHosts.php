<?php
// app/Http/Middleware/TrustHosts.php
namespace App\Http\Middleware;

use Closure;

class TrustHosts
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
