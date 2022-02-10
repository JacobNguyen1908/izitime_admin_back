<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class CheckSuperAdminExistence
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::where('user_type_id', 1)->first();
        if (!$user) {
            return response()->json([
                'message' => 'Could not find a super administrator.'
            ], 404);
        } else {
            return $next($request);
        }
    }
}
