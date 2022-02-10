<?php

namespace Tests\Feature\DBVM\AnomaliesAndStatisticsGeneration\DailySchedule\Fixed;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Support\FirstSetup;
use Tests\TestCase;

class FixedUnroundedEarlyArrivalNonCountedTest extends TestCase
{
    use DatabaseTransactions, FirstSetup;

    public function setUp():void {
        parent::setUp();
    }

    public function test_daily_schedule_fixed_unrounded_early_arrival_non_counted_without_break() {
        // Employee: 20, date: '31-08-2021'
        $this->authenticated();
        $employee_id = 20;
        $date = '2021-08-31';
        // Daily schedule
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"31",
            "name"=>"Horaires fixes / arrivée anticipée non comptée / temps compté non arrondi / sans pause",
            "type"=>"Fixed",
            "abbreviation"=>"HFAANCTCNASP",
            "max_counted_time"=>"08:30:00.0000000",
            "theorical_work_time"=>"08:30:00.0000000",
            "early_arrival_counted"=>"0",
            "round_option"=>"0",
            "round_time"=>"0",
            "counted_work_time_night"=>"0",
            "timeslots"=> [
                [
                    "duration_start_end"=>"510",
                    "practical_total_duration"=>"510",
                    "theoretical_break_duration"=>"0",
                    "practical_break_duration"=>"0",
                    "delay_tolerance_unrespected"=>"0",
                    "delay_tolerance_unrespected_validated"=>"0",
                    "delay_tolerance_unrespected_justified"=>"0",
                    "delay_penalty_default"=>"15","practical_delay_penalty"=>"0",
                    "early_departure_tolerance_unrespected"=>"0",
                    "early_departure_tolerance_unrespected_validated"=>"0",
                    "early_departure_tolerance_unrespected_justified"=>"0",
                    "early_departure_penalty_default"=>"15","practical_early_departure_penalty"=>"0",
                    "break_duration_exceeded"=>"0","break_duration_exceeded_validated"=>"0",
                    "break_duration_exceeded_justified"=>"0","fixed_break_not_respected"=>"0",
                    "fixed_break_not_respected_validated"=>"0","fixed_break_not_respected_justified"=>"0",
                    "duration_inter_justification"=>"0",
                    "duration_justification"=>"0",
                    "start_round_duration"=>"0",
                    "break_round_duration"=>"0",
                    "end_round_duration"=>"0",
                    "total_round_duration"=>"0",
                    "practical_round_duration"=>"0",
                    "justification_time"=>"0",
                    "practical_time_effect"=>"0",
                    "theoretical_time_effect"=>"0",
                    "nb_timeclocks_to_add_from_justification"=>"0",
                ]
            ]
        ]);
        // Anomalies
        $url = 'api/anomalies/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJsonCount(0);
    }

    public function test_daily_schedule_fixed_unrounded_early_arrival_non_counted_with_break() {
        // Employee: 20, date: '30-08-2021'
        $this->authenticated();
        $employee_id = 20;
        $date = '2021-08-30';
        // Daily schedule
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"34",
            "name"=>"Horaires fixes / arrivée anticipée non comptée / temps compté non arrondi / avec pause",
            "type"=>"Fixed",
            "abbreviation"=>"HFAANCTCNAAP",
            "max_counted_time"=>"07:55:00.0000000",
            "theorical_work_time"=>"07:55:00.0000000",
            "early_arrival_counted"=>"0",
            "round_option"=>"0",
            "round_time"=>"0",
            "counted_work_time_night"=>"0",
            "timeslots"=> [
                [
                    "duration_start_end"=>"463",
                    "practical_total_duration"=>"463",
                    "theoretical_break_duration"=>"15",
                    "practical_break_duration"=>"15",
                    "delay_tolerance_unrespected"=>"0",
                    "delay_tolerance_unrespected_validated"=>"0",
                    "delay_tolerance_unrespected_justified"=>"0",
                    "delay_penalty_default"=>"15","practical_delay_penalty"=>"0",
                    "early_departure_tolerance_unrespected"=>"1",
                    "early_departure_tolerance_unrespected_validated"=>"0",
                    "early_departure_tolerance_unrespected_justified"=>"0",
                    "early_departure_penalty_default"=>"15","practical_early_departure_penalty"=>"7",
                    "break_duration_exceeded"=>"0","break_duration_exceeded_validated"=>"0",
                    "break_duration_exceeded_justified"=>"0","fixed_break_not_respected"=>"0",
                    "fixed_break_not_respected_validated"=>"0","fixed_break_not_respected_justified"=>"0",
                    "duration_inter_justification"=>"0",
                    "duration_justification"=>"0",
                    "start_round_duration"=>"0",
                    "break_round_duration"=>"0",
                    "end_round_duration"=>"0",
                    "total_round_duration"=>"0",
                    "practical_round_duration"=>"0",
                    "justification_time"=>"0",
                    "practical_time_effect"=>"0",
                    "theoretical_time_effect"=>"0",
                    "nb_timeclocks_to_add_from_justification"=>"0",
                ]
            ]
        ]);

        // Anomalies
        $url = 'api/anomalies/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJsonCount(3);
        $response->assertJson([
            [
                "employee_id"=>"20",
                "anomaly_type_id"=>"9",
                "date"=>"2021-08-30",
                "level"=>"Daily schedule",
                "description"=>"Theoretical: 475 , Practical: 445",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Min work time not respected"
            ],
            [
                "employee_id"=>"20",
                "anomaly_type_id"=>"3",
                "date"=>"2021-08-30",
                "level"=>"Timeslot 1",
                "description"=>"Early departure tolerance: 5m, Exceed: 3m",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Early departure"
            ],
            [
                "employee_id"=>"20",
                "anomaly_type_id"=>"2",
                "date"=>"2021-08-30",
                "level"=>"Timeslot 2",
                "description"=>"Delay tolerance: 5m, Exceed: 1m",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Late arrival"
            ],
        ]);
    }
}
