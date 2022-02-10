<?php

namespace App\Http\Middleware;
use DB;
use Closure;

class CheckDatabase
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
        // Test database connection
        try {
            DB::connection()->getPdo();
            if(DB::connection()->getDatabaseName()){
                $total = DB::table('INFORMATION_SCHEMA.TABLES')->count();
                if ($total == 0) {
                    return response()->json(['message' => 'Database empty'], 404);
                } else {
                    return $next($request);
                }
            } else{
                return response()->json(['message' => 'Could not find the database. Please check your configuration.'], 404);
            }
        } catch (\Exception $e) {
            \Sentry\captureException($e);
            return response()->json(
                [
                    'message' => 'Could not open connection to database server.  Please check your configuration.',
                    'details' => $e->getMessage()
                ],
                404);
        }
    }
}
