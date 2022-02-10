<?php

namespace App\Http\Controllers;

use App\Models\Company_setting;
use Illuminate\Http\Request;
use App\Http\Controllers\AddressController;
use App\Models\Department;
use App\Models\Employee;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Create company
     *
     * @param  [string] name
     * @param  [int] address_id
     * @param  [string] language
     * @param  [string] timezone
     */
    public function createCompany(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'language' => 'required|string',
            'timezone' => 'required|string',
            'firstday' => 'required|string',
            'delay_penalty_default' => 'required| string',
            'early_departure_penalty_default' => 'required| string',
            'delay_tolerance_default' => 'required| string',
            'early_departure_tolerance_default' => 'required| string',
            'default_hours_per_day' => 'required| string',
            'cumulative_variance_option' => 'required| boolean',
            'night_start' => 'required|string',
            'night_end' => 'required|string',
            'monthly_justification_limit' => 'required|integer',
            'yearly_justification_limit' => 'required|integer',
            'date_start_yearly_justification_limit_count' => 'required|string'

        ]);
        DB::beginTransaction();
        try {
            $company = Company_setting::first();
            if ($company){
                return $this->updateOne(1,$request);
            } else {
                $addressController = new AddressController;
                $addressRequest = new Request([
                    'address_line_1' => $request->address_line_1,
                    'address_line_2' => $request->address_line_2,
                    'zipcode' => $request->zipcode,
                    'city' => $request->city,
                    'country' => $request->country
                ]);
                $addressId = ($addressController->create($addressRequest)->getData());

                if ($request->rotation === 0 || $request->rotation === '0' || $request->rotation === null) {
                    $request->rotation = null;
                }

                $company = new Company_setting([
                    'name' => $request->name,
                    'language' => $request->language,
                    'timezone' => $request->timezone,
                    'first_day_of_week' => $request->firstday,
                    'address_id' => $addressId[0],
                    'default_rotation_id' => $request->rotation,
                    'delay_penalty_default' => $request->delay_penalty_default,
                    'early_departure_penalty_default' => $request->early_departure_penalty_default,
                    'delay_tolerance_default' => $request->delay_tolerance_default,
                    'early_departure_tolerance_default' => $request->early_departure_tolerance_default,
                    'default_hours_per_day' => $request->default_hours_per_day,
                    'cumulative_variance_option' => $request->cumulative_variance_option,
                    'night_start' => $request->night_start,
                    'night_end' => $request->night_end,
                    'monthly_justification_limit' => $request->monthly_justification_limit,
                    'yearly_justification_limit' => $request->yearly_justification_limit,
                    'date_start_yearly_justification_limit_count' => Carbon::parse($request->date_start_yearly_justification_limit_count)->format('m-d')
                ]);
                $company->save();
                $success['id'] =  $company->id;
                DB::commit();
                return response()->json(['success'=>$success]);
            }
        } catch (Exception $e) {
            \Sentry\captureException($e);
            DB::rollback();
            return response()->json([
                'details'=>$e->getMessage(),
                'message'=>'Failed to update company settings'
            ]);
        }
    }

    /**
     * Get the company
     *
     * @return [json] company
     */
    public function company()
    {
        $company = Company_setting::first();
        if (Company_setting::first()) {
            $company = Company_setting::first()->with('address')->first();
        } else {
            $company = Company_setting::first();
        }
        // error_log(json_encode($company));
        return response()->json($company);
    }

     /**
     * Get the company default language
     *
     * @return [json] company
     */
    public function getCompanyLanguage()
    {
        $company = DB::table('company_settings')->select('language')->get(1);
        return response()->json($company);
    }



    /**
     * Update company settings
     */
    public function updateOne($id, Request $request)
    {
        $same_default_penalty = false;
        $same_default_tolerance = false;
        $same_company = false;
        $same_rotation = false;
        $same_default_hours_per_day = false;
        $same_cumulative_variance_option = false;
        $same_night_times = false;
        $same_justification_limits = false;

        $request->validate([
            'name' => 'required|string|unique:company_settings,name,' .$id,
            'language' => 'required|string',
            'timezone' => 'required|string',
            'firstday' => 'required|Integer',
            'delay_penalty_default' => 'required| string',
            'early_departure_penalty_default' => 'required| string',
            'delay_tolerance_default' => 'required| string',
            'early_departure_tolerance_default' => 'required| string',
            'default_hours_per_day' => 'required| string',
            'cumulative_variance_option' => 'required| boolean',
            'night_start' => 'required|string',
            'night_end' => 'required|string',
            'monthly_justification_limit' => 'required|integer',
            'yearly_justification_limit' => 'required|integer',
            'date_start_yearly_justification_limit_count' => 'required|string',
            'update_departments_employees_justification_limits' => 'boolean'
        ]);

        DB::beginTransaction();
        try {
            $company = Company_setting::findOrFail($id);

            // Update address
            $addressController = new AddressController;
            $addressRequest = new Request([
                'address_line_1' => $request->address_line_1,
                'address_line_2' => $request->address_line_2,
                'zipcode' => $request->zipcode,
                'city' => $request->city,
                'country' => $request->country
            ]);
            $result_address = ($addressController->updateOne($company->address_id, $addressRequest)->getData());
            // Update penalty and tolerance
            if (date('H:i', strtotime($company->delay_penalty_default)) == $request->delay_penalty_default &&
                date('H:i', strtotime($company->early_departure_penalty_default)) == $request->early_departure_penalty_default ) {
                $same_default_penalty = true;
            } else {
                $same_default_penalty = false;
            }
            if ( date('H:i', strtotime($company->delay_tolerance_default)) == $request->delay_tolerance_default &&
                date('H:i', strtotime($company->early_departure_tolerance_default))  == $request->early_departure_tolerance_default) {
                $same_default_tolerance = true;
            } else {
                $same_default_tolerance = false;
            }
            // Update rotation
            if ($request->rotation === 0 || $request->rotation === '0' || $request->rotation === null) {
                $request->rotation = null;
            }
            if ($company->default_rotation_id === $request->rotation) {
                $same_rotation = true;
            }
            if ( date('H:i', strtotime($company->default_hours_per_day)) == $request->default_hours_per_day){
                $same_default_hours_per_day = true;
            }
            if ($company->cumulative_variance_option === $request->cumulative_variance_option) {
                $same_cumulative_variance_option = true;
            }
            if ($company->night_start === $request->night_start && $company->night_end === $request->night_end) {
                $same_night_times = true;
            }
            $dateStartJustificationLimit = Carbon::createFromFormat('d/m', $request->date_start_yearly_justification_limit_count)->format('m-d');
            if ($company->monthly_justification_limit === $request->monthly_justification_limit && $company->yearly_justification_limit === $request->yearly_justification_limit
                && $company->date_start_yearly_justification_limit_count = $dateStartJustificationLimit) {
                $same_justification_limits = true;
            }
            // Update company settings general infos
            if ($company->name == $request->name && $company->language == $request->language && $company->timezone == $request->timezone &&
                $company->first_day_of_week == $request->firstday && $company->default_rotation_id == $request->rotation &&
                $same_default_penalty && $same_default_tolerance && $same_rotation && $same_default_hours_per_day &&
                $same_cumulative_variance_option && $same_night_times && $same_justification_limits) {
                $same_company = true;
            } else {
                $company->name = $request->name;
                $company->language = $request->language;
                $company->timezone = $request->timezone;
                $company->first_day_of_week = $request->firstday;
                $company->default_rotation_id = $request->rotation;
                $company->delay_penalty_default = $request->delay_penalty_default;
                $company->early_departure_penalty_default = $request->early_departure_penalty_default;
                $company->delay_tolerance_default = $request->delay_tolerance_default;
                $company->early_departure_tolerance_default = $request->early_departure_tolerance_default;
                $company->default_hours_per_day = $request->default_hours_per_day;
                $company->cumulative_variance_option = $request->cumulative_variance_option;
                $company->night_start = $request->night_start;
                $company->night_end = $request->night_end;
                $company->monthly_justification_limit = $request->monthly_justification_limit;
                $company->yearly_justification_limit = $request->yearly_justification_limit;
                $company->date_start_yearly_justification_limit_count = $dateStartJustificationLimit;
            }
            if ($same_company && property_exists($result_address,'same_address') && $result_address->same_address) {
                DB::rollback();
                return response()->json([
                    'message' => 'There is nothing to update.'
                ]);
            } else {
                // Update leave limits to all departments and employees
                if ($request->update_departments_employees_justification_limits &&
                    ($company->isDirty('monthly_justification_limit') || $company->isDirty('yearly_justification_limit'))) {
                    Department::query()->update([
                        'monthly_justification_limit' => $company->monthly_justification_limit,
                        'yearly_justification_limit' => $company->yearly_justification_limit
                    ]);
                    Employee::query()->update([
                        'monthly_justification_limit' => $company->monthly_justification_limit,
                        'yearly_justification_limit' => $company->yearly_justification_limit
                    ]);
                }
                $company->save();
                $res = [
                    'message' => 'Company settings successfully updated.'
                ];
                if (!$same_default_penalty || !$same_default_tolerance) {
                    $res['notice'] = 'Defaults values changed';
                    $res['penalty'] = !$same_default_penalty;
                    $res['tolerance'] = !$same_default_tolerance;
                    if (!$same_default_tolerance) {
                        $timeslotController = new TimeslotController;
                        $listTolerance = $timeslotController->getAllUsingDefaults()->getData();
                        $res['list'] = $listTolerance;
                    }
                }
                DB::commit();
                return response()->json($res);
            }
        } catch (Exception $e) {
            \Sentry\captureException($e);
            DB::rollback();
            return response()->json([
                'details'=>$e->getMessage(),
                'message'=>'Failed to update company settings'
            ]);
        }
    }
}
