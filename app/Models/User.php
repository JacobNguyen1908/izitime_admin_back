<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'day_of_birth', 'phone', 'email', 'password', 'user_type_id', 'address_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static $logAttributes = [
        'name', 'day_of_birth', 'phone', 'email', 'password', 'user_type_id', 'address_id'
    ];

    /**
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        return env('DB_DATABASE').'-'.'App.Models.User.'.$this->id;
    }

    public function getId() {
        return $this->id;
    }

    public function user_type()
    {
        return $this->belongsTo(UserType::class, 'user_type_id')->with('rights');
    }

    public function hasRight($requested_right){
        $userRights = $this->user_type->rights->pluck('description');
        return in_array($requested_right, json_decode($userRights));
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function getUserRights()
    {
        return $this->user_type->rights->pluck('description');
    }
}
