<?php

namespace Tests\Feature\DBVM\AnomaliesAndStatisticsGeneration\DailySchedule\Flexible;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Support\FirstSetup;
use Tests\TestCase;

class FlexibleRoundedTest extends TestCase
{
    use DatabaseTransactions, FirstSetup;

    public function setUp():void {
        parent::setUp();
    }

    /****************************************** Daily schedule FLEXIBLE **************************************/
    public function test_daily_schedule_flexible_rounded_with_break() {
        // Employee: 64, date: '09-08-2021'
        $this->authenticated();
        $employee_id = 64;
        $date = '2021-08-09';
        // Daily schedule
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"5",
            "name"=>"Horaire variable arrondi avec pause déduite",
            "type"=>"Variable",
            "abbreviation"=>"HVTCAAPD",
            "max_counted_time"=>"08:00:00.0000000",
            "theorical_work_time"=>"07:00:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"1",
            "round_time"=>"10",
            "counted_work_time_night"=>"0",
            "timeslots"=> [
                [
                    "duration_start_end"=>"443",
                    "practical_total_duration"=>"443",
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
                    "start_round_duration"=>"-5",
                    "break_round_duration"=>"0",
                    "end_round_duration"=>"0",
                    "total_round_duration"=>"-5",
                    "practical_round_duration"=>"-5",
                    "justification_time"=>"0",
                    "practical_time_effect"=>"0",
                    "theoretical_time_effect"=>"0",
                    "nb_timeclocks_to_add_from_justification"=>"0",
                ],
                [
                    "duration_start_end"=>"443",
                    "practical_total_duration"=>"413",
                    "theoretical_break_duration"=>"30",
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
                    "start_round_duration"=>"0",
                    "break_round_duration"=>"0",
                    "end_round_duration"=>"-8",
                    "total_round_duration"=>"-8",
                    "practical_round_duration"=>"-8",
                    "justification_time"=>"0",
                    "practical_time_effect"=>"0",
                    "theoretical_time_effect"=>"0",
                    "nb_timeclocks_to_add_from_justification"=>"0",
                ]
            ],
        ]);
        // Anomalies
        $url = 'api/anomalies/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJsonCount(0);

        /********************* With anomalies ***************************/
        $date = '2021-08-10';
        // Daily schedule
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"5",
            "name"=>"Horaire variable arrondi avec pause déduite",
            "type"=>"Variable",
            "abbreviation"=>"HVTCAAPD",
            "max_counted_time"=>"08:00:00.0000000",
            "theorical_work_time"=>"07:00:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"1",
            "round_time"=>"10",
            "counted_work_time_night"=>"0",
            "timeslots"=> [
                [
                    "duration_start_end"=>"400",
                    "practical_total_duration"=>"400",
                    "theoretical_break_duration"=>"0",
                    "practical_break_duration"=>"0",
                    "delay_tolerance_unrespected"=>"1",
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
                    "start_round_duration"=>"-2",
                    "break_round_duration"=>"0",
                    "end_round_duration"=>"0",
                    "total_round_duration"=>"-2",
                    "practical_round_duration"=>"-2",
                    "justification_time"=>"0",
                    "practical_time_effect"=>"0",
                    "theoretical_time_effect"=>"0",
                    "nb_timeclocks_to_add_from_justification"=>"0",
                ],
                [
                    "duration_start_end"=>"400",
                    "practical_total_duration"=>"370",
                    "theoretical_break_duration"=>"30",
                    "practical_break_duration"=>"0",
                    "delay_tolerance_unrespected"=>"0",
                    "delay_tolerance_unrespected_validated"=>"0",
                    "delay_tolerance_unrespected_justified"=>"0",
                    "delay_penalty_default"=>"0","practical_delay_penalty"=>"0",
                    "early_departure_tolerance_unrespected"=>"1",
                    "early_departure_tolerance_unrespected_validated"=>"0",
                    "early_departure_tolerance_unrespected_justified"=>"0",
                    "early_departure_penalty_default"=>"0","practical_early_departure_penalty"=>"0",
                    "break_duration_exceeded"=>"0","break_duration_exceeded_validated"=>"0",
                    "break_duration_exceeded_justified"=>"0","fixed_break_not_respected"=>"0",
                    "fixed_break_not_respected_validated"=>"0","fixed_break_not_respected_justified"=>"0",
                    "duration_inter_justification"=>"0",
                    "duration_justification"=>"0",
                    "start_round_duration"=>"0",
                    "break_round_duration"=>"0",
                    "end_round_duration"=>"-8",
                    "total_round_duration"=>"-8",
                    "practical_round_duration"=>"-8",
                    "justification_time"=>"0",
                    "practical_time_effect"=>"0",
                    "theoretical_time_effect"=>"0",
                    "nb_timeclocks_to_add_from_justification"=>"0",
                ]
            ],
        ]);
        // Anomalies
        $url = 'api/anomalies/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJsonCount(2);
        $response->assertJson([
            [
                "employee_id"=>"64",
                "anomaly_type_id"=>"2",
                "date"=>"2021-08-10",
                "level"=>"Timeslot 1",
                "description"=>"Delay tolerance: 0m, Exceed: 8m",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Late arrival"
            ],
            [
                "employee_id"=>"64",
                "anomaly_type_id"=>"3",
                "date"=>"2021-08-10",
                "level"=>"Timeslot 2",
                "description"=>"Early departure tolerance: 0m, Exceed: 12m",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Early departure"
            ]
        ]);
    }

    public function test_daily_schedule_flexible_rounded_without_break() {
        // Employee: 6, date: '09-08-2021'
        $this->authenticated();
        $employee_id = 6;
        $date = '2021-08-09';
        // Daily schedule
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"12",
            "name"=>"Horaire variable arrondi sans pause déduite",
            "type"=>"Variable",
            "abbreviation"=>"HVASP",
            "max_counted_time"=>"11:00:00.0000000",
            "theorical_work_time"=>"08:00:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"1",
            "round_time"=>"10",
            "counted_work_time_night"=>"0",
            "timeslots"=> [
                [
                    "duration_start_end"=>"480",
                    "practical_total_duration"=>"480",
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
            ],
        ]);
        // Anomalies
        $url = 'api/anomalies/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJsonCount(0);

        /********************* With anomalies ***************************/
        // Employee: 6, date: '10-08-2021'
        $employee_id = 6;
        $date = '2021-08-10';
        // Daily schedule
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"12",
            "name"=>"Horaire variable arrondi sans pause déduite",
            "type"=>"Variable",
            "abbreviation"=>"HVASP",
            "max_counted_time"=>"11:00:00.0000000",
            "theorical_work_time"=>"08:00:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"1",
            "round_time"=>"10",
            "counted_work_time_night"=>"0",
            "timeslots"=> [
                [
                    "duration_start_end"=>"565",
                    "practical_total_duration"=>"565",
                    "theoretical_break_duration"=>"0",
                    "practical_break_duration"=>"0",
                    "delay_tolerance_unrespected"=>"1",
                    "delay_tolerance_unrespected_validated"=>"0",
                    "delay_tolerance_unrespected_justified"=>"0",
                    "delay_penalty_default"=>"0","practical_delay_penalty"=>"0",
                    "early_departure_tolerance_unrespected"=>"1",
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
                    "start_round_duration"=>"0",
                    "break_round_duration"=>"0",
                    "end_round_duration"=>"-8",
                    "total_round_duration"=>"-8",
                    "practical_round_duration"=>"-8",
                    "extra_round_duration"=>'-7',
                    "justification_time"=>"0",
                    "practical_time_effect"=>"0",
                    "theoretical_time_effect"=>"0",
                    "nb_timeclocks_to_add_from_justification"=>"0",
                ]
            ],
        ]);
        // Anomalies
        $url = 'api/anomalies/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJsonCount(3);
        $response->assertJson([
            [
                "employee_id"=>"6",
                "anomaly_type_id"=>"2",
                "date"=>"2021-08-10",
                "level"=>"Timeslot 1",
                "description"=>
                "Delay tolerance: 0m, Exceed: 10m",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Late arrival"
            ],[
                "employee_id"=>"6",
                "anomaly_type_id"=>"3",
                "date"=>"2021-08-10",
                "level"=>"Timeslot 1",
                "description"=>"Early departure tolerance: 0m, Exceed: 12m",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Early departure"
            ],[
                "employee_id"=>"6",
                "anomaly_type_id"=>"8",
                "date"=>"2021-08-10",
                "level"=>"Daily schedule",
                "description"=>"Theorical checks: 2, Practical checks: 4",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Incorrect number of checks"
            ]
        ]);
    }
}
