<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'nb_employees', 'licence_users', 'licence_leaves', 'licence_planning', 'licence_cumulative_variance', 'licence_public_holidays'
    ];
}
