<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Spatie\Activitylog\Traits\LogsActivity;

class Address extends Model
{
    // Action time
    public $timestamps = true;
    // User who did action
    use Userstamps;
    use LogsActivity;

    protected $fillable = [
        'address_line_1', 'address_line_2', 'zip_code', 'city', 'country'
    ];

    protected static $logAttributes = [
        'address_line_1', 'address_line_2', 'zip_code', 'city', 'country'
    ];
}
