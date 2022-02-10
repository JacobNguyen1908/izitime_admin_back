<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class UserTypeRights extends Model
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
        'user_type_id', 'user_right_id'
    ];

    protected static $logAttributes = [
        'user_type_id', 'user_right_id'
    ];
}
