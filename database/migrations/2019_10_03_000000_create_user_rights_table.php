<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class CreateUserRightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_rights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->timestamps();
        });

        // Seed table with all possible user rights
        $user_rights = [
            // employees
            'view_employees',
            'add_employees',
            'edit_employees',
            'delete_employees',

            // departments
            'view_departments',
            'add_departments',
            'edit_departments',
            'delete_departments',

            // daily schedules
            'view_daily_schedules',
            'add_daily_schedules',
            'edit_daily_schedules',
            'delete_daily_schedules',

            // rotations
            'view_rotations',
            'add_rotations',
            'edit_rotations',
            'delete_rotations',

            // justifications
            'view_justifications',
            'add_justifications',
            'edit_justifications',
            'delete_justifications',

            // planning
            'view_planning',
            'add_planning',
            'edit_planning',
            'delete_planning',

            // statistics
            'view_statistics',

            // sites
            'view_sites',
            'add_sites',
            'edit_sites',
            'delete_sites',

            // access schedules
            'view_access_schedules',
            'add_access_schedules',
            'edit_access_schedules',
            'delete_access_schedules',

            // time clocks
            'view_time_clocks',
            'add_time_clocks',
            'edit_time_clocks',
            'delete_time_clocks',

            // devices
            'view_devices',
            'add_devices',
            'edit_devices',
            'delete_devices',

            // counters
            'view_counters',
            'add_counters',
            'edit_counters',
            'delete_counters',

            // public holidays
            'view_public_holidays',
            'add_public_holidays',
            'edit_public_holidays',
            'delete_public_holidays',

            // anomaly types
            'view_anomaly_types',
            'edit_anomaly_types',

            // activity_logs
            'view_activity_logs',
            'add_activity_logs',
            'edit_activity_logs',
            'delete_activity_logs'
        ];

        foreach ($user_rights as $right) {
            DB::table('user_rights')->insert(array('description' => $right));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_rights');
    }
}
