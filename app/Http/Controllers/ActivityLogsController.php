<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLogsController extends Controller
{
    /**
     * Get all activity logs
     *
     * @return [json] users
     */
    public function getActivityLogs()
    {
        return response()->json(Activity::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Paginate
     *
     * @return [json] users
     */
    public function paginate($limit=null, $order=null, $direction=null)
    {
        $logs = Activity::orderBy($order ? $order : 'updated_at', $direction ? $direction : 'desc')->paginate($limit ? $limit : 10);
        return response()->json($logs);
    }
}
