<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class CheckDatabaseController extends Controller
{
    public function checkConnection(Request $request)
    {
        try {
            DB::connection()->getPdo();
            if(DB::connection()->getDatabaseName()){
                return response()->json(['message' => 'Successfully connected to the database: '
                                                       .DB::connection()->getDatabaseName()]);
            }else{
                return response()->json(['message' => 'Could not find the database. Please check your configuration.'], 404);
            }
        } catch (\Exception $e) {
            \Sentry\captureException($e);
            return response()->json(['message' => 'Could not open a connection to the server.  Please check your configuration.'], 404);
        }
    }

    public function checkSuperAdmin(Request $request)
    {
        $user = User::where('user_type_id', 1)->first();
        if (!$user) {
            return response()->json([
                'message' => 'Could not find a super administrator.'
            ], 404);
        } else {
            return response()->json([
                'message' => 'Super administrator exists.'
            ]);
        }
    }
}
