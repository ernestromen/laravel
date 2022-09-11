<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IpCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        $info = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
        if($info['country'] !== 'United Kingdom' || $info['country'] !== 'Australia'){
        abort(403);
        }
    }
}
