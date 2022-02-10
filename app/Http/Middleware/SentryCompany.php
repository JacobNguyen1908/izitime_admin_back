<?php

namespace App\Http\Middleware;

use App\Models\Company_setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SentryCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(app()->bound('sentry'))
        {
            if (Schema::hasTable('company_settings') && Company_setting::count() > 0) {
                \Sentry\configureScope(function (\Sentry\State\Scope $scope): void {
                    $scope->setContext('Company', [
                        'name' => Company_setting::first()->name
                    ]);
                });
            }
        }
        return $next($request);
    }
}
