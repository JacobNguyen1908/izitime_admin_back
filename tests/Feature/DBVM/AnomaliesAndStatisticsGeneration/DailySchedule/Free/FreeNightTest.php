<?php

namespace Tests\Feature\DBVM\AnomaliesAndStatisticsGeneration\DailySchedule\Free;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Support\FirstSetup;
use Tests\TestCase;

class FreeNightTest extends TestCase
{
    use DatabaseTransactions, FirstSetup;

    public function setUp():void {
        parent::setUp();
    }

    public function test_daily_schedule_free_night_without_break() {
        // Employee: 63, date: '09-08-2021'
        $this->authenticated();
        $employee_id = 63;
        $date = '2021-08-09';
        // Shift
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"3",
            "name"=>"Horaires libres nuit sans pause déduite",
            "type"=>"Libre",
            "abbreviation"=>"HLNSPD",
            "max_counted_time"=>"10:00:00.0000000",
            "theorical_work_time"=>"00:00:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"0",
            "round_time"=>"0",
            "counted_work_time_night"=>"420",
            "timeslots"=> [
                [
                    "duration_start_end"=>"780",
                    "practical_total_duration"=>"780",
                    "theoretical_break_duration"=>"0",
                    "practical_break_duration"=>"0",
                    "delay_tolerance_unrespected"=>"0",
                    "delay_tolerance_unrespected_validated"=>"0",
                    "delay_tolerance_unrespected_justified"=>"0",
                    "delay_penalty_default"=>"0","practical_delay_penalty"=>"0",
                    "early_departure_tolerance_unrespected"=>"0",
                    "early_departure_tolerance_unrespected_validated"=>"0",
                    "early_departure_tolerance_unrespected_justified"=>"0",
                    "early_departure_penalty_default"=>"0","practical_early_departure_penalty"=>"0",
                    "break_duration_exceeded"=>"0","break_duration_exceeded_validated"=>"0",
                    "break_duration_exceeded_justified"=>"0","fixed_break_not_respected"=>"0",
                    "fixed_break_not_respected_validated"=>"0","fixed_break_not_respected_justified"=>"0",
                    "duration_inter_justification"=>"0",
                    "duration_justification"=>"0",
                    "start_round_duration"=>null,
                    "break_round_duration"=>null,
                    "end_round_duration"=>null,
                    "total_round_duration"=>"0",
                    "practical_round_duration"=>"0",
                    "justification_time"=>"0",
                    "practical_time_effect"=>"0",
                    "theoretical_time_effect"=>"0",
                ]
            ],
        ]);
        // Shift
        $url = 'api/anomalies/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJsonCount(0);
    }

    public function test_daily_schedule_free_night_with_break() {
        // Employee: 2, date: '09-08-2021'
        $this->authenticated();
        $employee_id = 2;
        $date = '2021-08-09';
        // Shift
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"4",
            "name"=>"Horaires libres nuit avec pause déduite",
            "type"=>"Libre",
            "abbreviation"=>"HLNAPD",
            "max_counted_time"=>"12:30:00.0000000",
            "theorical_work_time"=>"00:00:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"0",
            "round_time"=>"0",
            "counted_work_time_night"=>"420",
            "timeslots"=> [
                [
                    "theoretical_break_duration"=>"120",
                    "practical_break_duration"=>"120",
                    "duration_start_end"=>"780",
                    "practical_total_duration"=>"660",
                    "delay_tolerance_unrespected"=>"0",
                    "delay_tolerance_unrespected_validated"=>"0",
                    "delay_tolerance_unrespected_justified"=>"0",
                    "delay_penalty_default"=>"0",
                    "practical_delay_penalty"=>"0",
                    "early_departure_tolerance_unrespected"=>"0",
                    "early_departure_tolerance_unrespected_validated"=>"0",
                    "early_departure_tolerance_unrespected_justified"=>"0",
                    "early_departure_penalty_default"=>"0",
                    "practical_early_departure_penalty"=>"0",
                    "break_duration_exceeded"=>"0",
                    "break_duration_exceeded_validated"=>"0",
                    "break_duration_exceeded_justified"=>"0",
                    "fixed_break_not_respected"=>"0",
                    "fixed_break_not_respected_validated"=>"0",
                    "fixed_break_not_respected_justified"=>"0",
                    "duration_inter_justification"=>"0",
                    "duration_justification"=>"0",
                    "start_round_duration"=>null,
                    "break_round_duration"=>null,
                    "end_round_duration"=>null,
                    "total_round_duration"=>"0",
                    "practical_round_duration"=>"0",
                    "justification_time"=>"0",
                    "practical_time_effect"=>"0",
                    "theoretical_time_effect"=>"0",
                ]
            ],
        ]);
        // Shift
        $url = 'api/anomalies/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJsonCount(0);
    }
}
