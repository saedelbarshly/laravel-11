<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Tenant;
use App\Services\TenantDatabaseServices;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $subdomain = $request->getHost();
        if($subdomain && $subdomain != "localhost"){
            $tenant = Tenant::where('subdomain', $subdomain)->first();
            if($tenant && config('database.connections.tenant.database') != $tenant){
                app()->instance('tenant', $tenant);
                (new TenantDatabaseServices())->connectToDB($tenant);
                (new TenantDatabaseServices())->migrateDB($tenant);
            }else{
                abort(404);
            }
        }
        return $next($request);
    }
}
