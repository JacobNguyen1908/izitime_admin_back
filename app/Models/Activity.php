<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity_log';
    protected $fillable = ['*'];


    public function getUser(){
        return $this->hasOne('App\Models\User','id','causer_id');
    }

    public function getSubject(){
        return $this->hasOne('App\Models\User','id','causer_id');
    }
 }
