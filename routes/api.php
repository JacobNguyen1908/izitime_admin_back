<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Create database
Route::group([], function () {
    Route::get('create-db', 'FirstSetupController@createDatabase');
});

// Guards: Check database connection
Route::group([
    'middleware' => 'check.db',
    'prefix' => 'auth'
], function () {
    // route for creating a user (include super admin at the beginning)
    Route::post('signup', 'UserController@create');
});

// Guards: Check database connection, super admin
Route::group([
    'middleware' => ['check.if.need.company.settings', 'web']
], function () {
    // route for login
    Route::group(
        [
         'prefix' => 'auth'
        ], function () {
            Route::post('login', 'UserController@login');
        }
    );

    Route::group([
        'namespace' => 'Auth',
        'middleware' => ['api', 'web'],
        'prefix' => 'password'
    ], function () {
        Route::post('create', 'ResetPasswordController@create');
        Route::get('find/{token}', 'ResetPasswordController@find');
        Route::post('reset', 'ResetPasswordController@reset');
    });

    Route::group([
        'prefix' => 'auth'
    ], function () {
        Route::get('check-if-authenticated', 'UserController@checkIfAuthenticated');

        Route::group([
          'middleware' => ['auth:api', 'web']
        ], function() {
            Route::get('logout', 'UserController@logout');
            Route::get('user', 'UserController@user');
        });
    });
});

// Guards: Check database connection, super admin and company settings
Route::group([
    'middleware' => 'check.if.need.first.setup'
], function() {
    Route::group([
    ], function () {
        // Route::get('check-db-connection', 'CheckDatabaseController@checkConnection');
        Route::get('check-super-admin', 'CheckDatabaseController@checkSuperAdmin');
        Route::group(
            [
             'middleware' => ['auth:api','check.if.sa', 'web']
            ], function () {
                // Company settings
                Route::put('company/{id}', 'CompanyController@updateOne');

                // User rights
                Route::get('user-right', 'UserRightController@getAll');

                // Users
                Route::get('users', 'UserController@getAll');
                Route::get('users/{id}', 'UserController@getOne');
                Route::post('users', 'UserController@create');
                Route::delete('users/{id}', 'UserController@deleteOne');
                Route::put('users/{id}', 'UserController@updateOne');

                // User types
                Route::post('user-type', 'UserType\UserTypeController@create');
                Route::get('user-type', 'UserType\UserTypeController@getAll');
                Route::get('user-type/{id}', 'UserType\UserTypeController@getOne');
                Route::delete('user-type/{id}', 'UserType\UserTypeController@deleteOne');
                Route::put('user-type/{id}', 'UserType\UserTypeController@updateOne');
            }
        );
        Route::group(
            [
             'middleware' => ['auth:api', 'web']
            ], function () {
                // Activity logs
                Route::get('activity-logs', 'ActivityLogsController@getActivityLogs')->middleware('can:view_activity_logs');
                Route::get('activity-logs/paginate/{limit?}/{sort?}/{order?}', 'ActivityLogsController@paginate')->middleware('can:view_activity_logs');

                // Licences
                Route::post('licences', 'LicenceController@create');
            }
        );
    });
});
