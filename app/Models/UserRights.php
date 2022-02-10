<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class UserRights extends Model
{
    use LogsActivity;

    // Action time
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description'
    ];

    protected static $logAttributes = [
        'description'
    ];

    public function user_type_rights()
    {
        return $this->hasMany(UserTypeRights::class);
    }

    public function user_types() {
        return $this->belongsToMany(UserType::class, UserTypeRights::class, 'user_type_id', 'user_right_id');
    }
}
