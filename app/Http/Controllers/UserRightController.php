<?php

namespace App\Http\Controllers\UserType;

use App\Http\Controllers\Controller;
use App\Models\UserRights;
use Illuminate\Http\Request;

class UserRightController extends Controller
{

    /**
     * Get all user rights
     *
     */
    public function getAll(Request $request)
    {
        return response()->json(UserRights::where('description','<>','view_personal_time_clocks')->where('description', '<>', 'add_personal_time_clocks')->get());
    }


}
