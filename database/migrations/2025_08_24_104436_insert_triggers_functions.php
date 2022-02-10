<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertTriggersFunctions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Set triggers
        $files = File::files(__DIR__ .'/sql/Triggers');
        foreach($files as $file) {
            DB::unprepared(File::get($file));
        }

        // Set functions
        $files = File::files(__DIR__ .'/sql/Functions');
        foreach($files as $file) {
            DB::unprepared(File::get($file));
        }

        // Set procedures
        $files = File::files(__DIR__ .'/sql/Procedures');
        foreach($files as $file) {
            DB::unprepared(File::get($file));
        }
    }

    /**
     * Reverse the migrations.y
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
