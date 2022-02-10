<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

$dbName = env('DB_DATABASE');

Broadcast::channel('{db}-App.Models.User.{userId}', function ($user, $db, $userId) use ($dbName) {
    return +$user->id === +$userId && $db === $dbName;
});

Broadcast::channel('{db}-stats', function ($user, $db) use ($dbName) {
    $userCount = User::find($user->id)->where('email', $user->email)->where('phone', $user->phone)->count();
    if ($userCount >= 1 && $db === $dbName) {
        return $user;
    }
});
