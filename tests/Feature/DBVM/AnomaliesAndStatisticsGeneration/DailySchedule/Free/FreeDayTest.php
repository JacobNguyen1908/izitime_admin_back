<?php

namespace Tests\Feature\DBVM\AnomaliesAndStatisticsGeneration\DailySchedule\Free;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Support\FirstSetup;
use Tests\TestCase;

class FreeDayTest extends TestCase
{
    use DatabaseTransactions, FirstSetup;

    public function setUp():void {
        parent::setUp();
    }

    public function test_daily_schedule_free_day_without_break() {
        // Employee: 7, date: '09-08-2021'
        $this->authenticated();
        $employee_id = 7;
        $date = '2021-08-09';
        // Shift
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"1",
            "name"=>"Horaire Libre Jour Sans Pause Déduite",
            "color"=>"#1fccbc",
            "type"=>"Libre",
            "abbreviation"=>"HLJSPD",
            "max_counted_time"=>"08:00:00.0000000",
            "theorical_work_time"=>"00:00:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"0",
            "round_time"=>"0",
            "timeslots"=> [
                [
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
                    "duration_start_end"=>"480",
                    "duration_inter_justification"=>"0",
                    "duration_justification"=>"0",
                    "practical_total_duration"=>"480",
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
            "counted_work_time_night"=>"60"
        ]);
        // Shift
        $url = 'api/anomalies/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJsonCount(0);
    }



    public function test_daily_schedule_free_day_with_break() {
        // Employee: 20, date: '09-08-2021'
        $this->authenticated();
        $employee_id = 20;
        $date = '2021-08-09';
        // Shift
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"2",
            "name"=>"Horaire Libre Jour Avec Pause Déduite",
            "type"=>"Libre",
            "abbreviation"=>"HLJAPD",
            "max_counted_time"=>"08:00:00.0000000",
            "theorical_work_time"=>"00:00:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"1",
            "round_time"=>"10",
            "counted_work_time_night"=>"0",
            "timeslots"=> [
                [
                    "duration_start_end"=>"570",
                    "practical_total_duration"=>"480",
                    "theoretical_break_duration"=>"90",
                    "practical_break_duration"=>"90",
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
            ]
        ]);
        // Shift
        $url = 'api/anomalies/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJsonCount(0);
    }
}
