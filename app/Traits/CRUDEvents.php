<?php
namespace App\Traits;
trait CRUDEvents
{
    public static function bootTrackable()
    {
        static::creating(function ($model) {
            // blah blah
        });

        static::updating(function ($model) {
            // error_log(json_encode($model));
        });

        static::deleting(function ($model) {
            // bluh bluh
        });
    }
}
