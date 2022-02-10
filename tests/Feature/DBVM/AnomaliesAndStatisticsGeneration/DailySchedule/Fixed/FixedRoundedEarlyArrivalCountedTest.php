<?php

namespace Tests\Feature\DBVM\AnomaliesAndStatisticsGeneration\DailySchedule\Fixed;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Support\FirstSetup;
use Tests\TestCase;

class FixedRoundedEarlyArrivalCountedTest extends TestCase
{
    use DatabaseTransactions, FirstSetup;

    public function setUp():void {
        parent::setUp();
    }

    public function test_daily_schedule_fixed_rounded_early_arrival_counted_without_break() {
        // Employee: 4, date: '09-08-2021'
        $this->authenticated();
        $employee_id = 4;
        $date = '2021-08-09';
        // Daily schedule
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"25",
            "name"=>"Horaires fixes / arrivée anticipée comptée / temps compté arrondi / sans pause",
            "type"=>"Fixed",
            "abbreviation"=>"HFAACTCASP",
            "max_counted_time"=>"08:00:00.0000000",
            "theorical_work_time"=>"08:00:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"1",
            "round_time"=>"15",
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
            ]
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
            "daily_schedule_id"=>"25",
            "name"=>"Horaires fixes / arrivée anticipée comptée / temps compté arrondi / sans pause",
            "type"=>"Fixed",
            "abbreviation"=>"HFAACTCASP",
            "max_counted_time"=>"08:00:00.0000000",
            "theorical_work_time"=>"08:00:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"1",
            "round_time"=>"15",
            "counted_work_time_night"=>"0",
            "timeslots"=> [
                [
                    "duration_start_end"=>"465",
                    "practical_total_duration"=>"465",
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
        $response->assertJsonCount(2);
        $response->assertJson([
            [
                "employee_id"=>"4",
                "anomaly_type_id"=>"9",
                "date"=>"2021-08-10",
                "level"=>"Daily schedule",
                "description"=>"Theoretical: 480 , Practical: 465",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Min work time not respected"
            ],
            [
                "employee_id"=>"4",
                "anomaly_type_id"=>"2",
                "date"=>"2021-08-10",
                "level"=>"Timeslot 1",
                "description"=>"Delay tolerance: 5m, Exceed: 10m",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Late arrival"
            ]
        ]);
    }

    public function test_daily_schedule_fixed_rounded_early_arrival_counted_with_break() {
        // Employee: 3, date: '09-08-2021'
        $this->authenticated();
        $employee_id = 3;
        $date = '2021-08-09';
        // Daily schedule
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"26",
            "name"=>"Horaires fixes / arrivée anticipée comptée / temps compté arrondi / avec pause déduite",
            "type"=>"Fixed",
            "abbreviation"=>"HFAACTCAAP",
            "max_counted_time"=>"07:30:00.0000000",
            "theorical_work_time"=>"07:30:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"1",
            "round_time"=>"15",
            "counted_work_time_night"=>"0",
            "timeslots"=> [
                [
                    "duration_start_end"=>"450",
                    "practical_total_duration"=>"450",
                    "theoretical_break_duration"=>"30",
                    "practical_break_duration"=>"30",
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
            ]
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
            "daily_schedule_id"=>"26",
            "name"=>"Horaires fixes / arrivée anticipée comptée / temps compté arrondi / avec pause déduite",
            "type"=>"Fixed",
            "abbreviation"=>"HFAACTCAAP",
            "max_counted_time"=>"07:30:00.0000000",
            "theorical_work_time"=>"07:30:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"1",
            "round_time"=>"15",
            "counted_work_time_night"=>"0",
            "timeslots"=> [
                [
                    "duration_start_end"=>"443",
                    "practical_total_duration"=>"443",
                    "theoretical_break_duration"=>"30",
                    "practical_break_duration"=>"37",
                    "delay_tolerance_unrespected"=>"0",
                    "delay_tolerance_unrespected_validated"=>"0",
                    "delay_tolerance_unrespected_justified"=>"0",
                    "delay_penalty_default"=>"0","practical_delay_penalty"=>"0",
                    "early_departure_tolerance_unrespected"=>"0",
                    "early_departure_tolerance_unrespected_validated"=>"0",
                    "early_departure_tolerance_unrespected_justified"=>"0",
                    "early_departure_penalty_default"=>"0",
                    "practical_early_departure_penalty"=>"0",
                    "break_duration_exceeded"=>"1",
                    "break_duration_exceeded_validated"=>"0",
                    "break_duration_exceeded_justified"=>"0",
                    "fixed_break_not_respected"=>"1",
                    "fixed_break_not_respected_validated"=>"0",
                    "fixed_break_not_respected_justified"=>"0",
                    "duration_inter_justification"=>"0",
                    "duration_justification"=>"0",
                    "start_round_duration"=>"0",
                    "break_round_duration"=>"-8",
                    "end_round_duration"=>"0",
                    "total_round_duration"=>"-8",
                    "practical_round_duration"=>"-8",
                    "justification_time"=>"0",
                    "practical_time_effect"=>"0",
                    "theoretical_time_effect"=>"0",
                    "nb_timeclocks_to_add_from_justification"=>"0"
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
                "employee_id"=>"3",
                "anomaly_type_id"=>"4",
                "date"=>"2021-08-10",
                "level"=>"Timeslot 1",
                "description"=>"{\"theoretical_break_start\" : \"1970-02-01T11:00:00\",\"theoretical_break_end\" : \"1970-02-01T11:30:00\",\"practical_break_start\": \"2021-08-10T11:15:00\",\"practical_break_end\": \"2021-08-10T11:52:00\"}",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Fixed break not respected"
            ],
            [
                "employee_id"=>"3",
                "anomaly_type_id"=>"9",
                "date"=>"2021-08-10",
                "level"=>"Daily schedule",
                "description"=>"Theoretical: 450 , Practical: 435",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Min work time not respected"
            ],
            [
                "employee_id"=>"3",
                "anomaly_type_id"=>"5",
                "date"=>"2021-08-10",
                "level"=>"Timeslot 1",
                "description"=>"{\"theoretical_duration\" : \"30\",\"practical_duration\" : \"37\",\"practical_break_start\" : \"2021-08-10T11:15:00\",\"practical_break_end\" : \"2021-08-10T11:52:00\",\"exceed\" : \"7\"}",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Break duration exceeded"
            ]
        ]);
    }
}
