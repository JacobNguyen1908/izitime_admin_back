<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class UserType extends Model
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
        'name'
    ];

    protected static $logAttributes = [
        'name'
    ];

    public function user_type_rights(){
        return $this->hasMany(UserTypeRights::class);
    }

    public function rights() {
        return $this->belongsToMany(UserRights::class, UserTypeRights::class, 'user_type_id', 'user_right_id')->select(array('description'));
    }
}
