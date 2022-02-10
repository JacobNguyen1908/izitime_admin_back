<?php

namespace App\Http\Controllers;

use App\Models\Licence;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LicenceController extends Controller
{
     /**
     * Get all justications
     */
    public function getAll()
    {
        $leaves = Licence::get();
        return response()->json($leaves);
    }

    /**
     * Create a record
     */
    public function create(Request $request) {
        $request->validate([
            'nb_employees' => 'required|integer',
            'licence_users' => 'required|boolean',
            'licence_leaves' => 'required|boolean',
            'licence_planning' => 'required|boolean',
            'licence_cumulative_variance' => 'required|boolean',
            'licence_public_holidays' => 'required|boolean',
        ]);
        DB::beginTransaction();
        try {
            $now = Carbon::now();
            $array = ['licence_users', 'licence_leaves', 'licence_planning', 'licence_cumulative_variance', 'licence_public_holidays'];
            $last = Licence::all()->last();
            $new = new Licence;
            $new->date = $now;
            $new->nb_employees = $request->nb_employees;
            $new->licence_users = $request->licence_users;
            $new->licence_leaves = $request->licence_leaves;
            $new->licence_planning = $request->licence_planning;
            $new->licence_cumulative_variance = $request->licence_cumulative_variance;
            $new->licence_public_holidays = $request->licence_public_holidays;
            $new->save();
            // Compare new to last in order to create log
            foreach($array as $licence) {
                if (isset($last)) {
                    if (+$new[$licence] !== +$last[$licence]) {
                        $logDescription = $licence;
                        $action = +$new[$licence] === 1 ? 'activated' : 'desactivated';
                        activity()->withProperties(['licence' => $logDescription, 'action' => $action, 'nb_employees' => $new->nb_employees])->log($logDescription.' '.$action);
                    }
                } else {
                    if (+$new[$licence] === 1) {
                        activity()->withProperties(['licence' => $licence, 'action' => 'activated', 'nb_employees' => $new->nb_employees])->log($licence.' activated');
                    }
                }
            }
            DB::commit();
            return response()->json([
                'message' => 'Licences successfully updated'
            ]);
        } catch (Exception $e) {
            \Sentry\captureException($e);
            DB::rollback();
            return response()->json([
                'message' => 'Failed to create',
                'details' => $e->getMessage()
            ], 500);
        }
    }

}
