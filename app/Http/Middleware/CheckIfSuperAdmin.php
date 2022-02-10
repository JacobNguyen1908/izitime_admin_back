<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfSuperAdmin
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
        $user = $request->user();
        if ($user->user_type_id != 1) {
            return response()->json([
                'message' => 'You are not a super administrator.'
            ], 403);
        } else {
            return $next($request);
        }
    }
}
