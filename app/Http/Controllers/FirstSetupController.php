<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Artisan;

class FirstSetupController extends Controller
{
    /**
     * First setupDB:
     * Execute command php artisan
     * @return [json] response
     */
    public function createDatabase(Request $request)
    {
        try
		{
            // force artisan to migrate passport
            Artisan::call('migrate', ['--path' => 'vendor/laravel/passport/database/migrations']);
			// php artisan migrate
            Artisan::call('migrate');
            // php passport install for generate token
            Artisan::call('passport:install');
            // php artisan storage:link pour créer un dossier afin de stocker les images des employées (temporaire)
            Artisan::call('storage:link');

            return response()->json([
                'message' => 'Database succesfully created'
            ]);
		}
		catch(Exception $e)
		{
            \Sentry\captureException($e);
			return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
