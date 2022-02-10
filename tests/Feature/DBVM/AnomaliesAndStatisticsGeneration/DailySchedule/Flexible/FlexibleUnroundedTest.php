<?php

namespace Tests\Feature\DBVM\AnomaliesAndStatisticsGeneration\DailySchedule\Flexible;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Support\FirstSetup;
use Tests\TestCase;

class FlexibleUnroundedTest extends TestCase
{
    use DatabaseTransactions, FirstSetup;

    public function setUp():void {
        parent::setUp();
    }

    public function test_daily_schedule_flexible_unrounded_with_break() {
        // Employee: 5, date: '09-08-2021'
        $this->authenticated();
        $employee_id = 5;
        $date = '2021-08-09';
        // Daily schedule
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"27",
            "name"=>"Horaires variable non arrondi avec pause déduite",
            "type"=>"Variable",
            "abbreviation"=>"HVNAAP",
            "max_counted_time"=>"08:30:00.0000000",
            "theorical_work_time"=>"07:10:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"0",
            "round_time"=>"0",
            "counted_work_time_night"=>"0",
            "timeslots"=> [
                [
                    "duration_start_end"=>"460",
                    "practical_total_duration"=>"430",
                    "theoretical_break_duration"=>"30",
                    "practical_break_duration"=>"0",
                    "delay_tolerance_unrespected"=>"0",
                    "delay_tolerance_unrespected_validated"=>"0",
                    "delay_tolerance_unrespected_justified"=>"0",
                    "delay_penalty_default"=>"15",
                    "practical_delay_penalty"=>"0",
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
                ],
                [
                    "duration_start_end"=>"460",
                    "practical_total_duration"=>"460",
                    "theoretical_break_duration"=>"20",
                    "practical_break_duration"=>"20",
                    "delay_tolerance_unrespected"=>"0",
                    "delay_tolerance_unrespected_validated"=>"0",
                    "delay_tolerance_unrespected_justified"=>"0",
                    "delay_penalty_default"=>"15",
                    "practical_delay_penalty"=>"0",
                    "early_departure_tolerance_unrespected"=>"0",
                    "early_departure_tolerance_unrespected_validated"=>"0",
                    "early_departure_tolerance_unrespected_justified"=>"0",
                    "early_departure_penalty_default"=>"15",
                    "practical_early_departure_penalty"=>"0",
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
        $date = '2021-08-10';
        // Daily schedule
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"27",
            "name"=>"Horaires variable non arrondi avec pause déduite",
            "type"=>"Variable",
            "abbreviation"=>"HVNAAP",
            "max_counted_time"=>"08:30:00.0000000",
            "theorical_work_time"=>"07:10:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"0",
            "round_time"=>"0",
            "counted_work_time_night"=>"0",
            "timeslots"=> [
                [
                    "duration_start_end"=>"510",
                    "practical_total_duration"=>"480",
                    "theoretical_break_duration"=>"30",
                    "practical_break_duration"=>"0",
                    "delay_tolerance_unrespected"=>"1",
                    "delay_tolerance_unrespected_validated"=>"0",
                    "delay_tolerance_unrespected_justified"=>"0",
                    "delay_penalty_default"=>"15",
                    "practical_delay_penalty"=>"0",
                    "early_departure_tolerance_unrespected"=>"1",
                    "early_departure_tolerance_unrespected_validated"=>"0",
                    "early_departure_tolerance_unrespected_justified"=>"0",
                    "early_departure_penalty_default"=>"15","practical_early_departure_penalty"=>"13",
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
                ],
                [
                    "duration_start_end"=>"510",
                    "practical_total_duration"=>"509",
                    "theoretical_break_duration"=>"20",
                    "practical_break_duration"=>"19",
                    "delay_tolerance_unrespected"=>"0",
                    "delay_tolerance_unrespected_validated"=>"0",
                    "delay_tolerance_unrespected_justified"=>"0",
                    "delay_penalty_default"=>"15",
                    "practical_delay_penalty"=>"0",
                    "early_departure_tolerance_unrespected"=>"0",
                    "early_departure_tolerance_unrespected_validated"=>"0",
                    "early_departure_tolerance_unrespected_justified"=>"0",
                    "early_departure_penalty_default"=>"15",
                    "practical_early_departure_penalty"=>"0",
                    "break_duration_exceeded"=>"0","break_duration_exceeded_validated"=>"0",
                    "break_duration_exceeded_justified"=>"0","fixed_break_not_respected"=>"1",
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
        $response->assertJsonCount(3);
        $response->assertJson([
            [
                "employee_id"=>"5",
                "anomaly_type_id"=>"2",
                "date"=>"2021-08-10",
                "level"=>"Timeslot 1",
                "description"=>"Delay tolerance: 0m, Exceed: 30m",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Late arrival"
            ],
            [
                "employee_id"=>"5",
                "anomaly_type_id"=>"3",
                "date"=>"2021-08-10",
                "level"=>"Timeslot 1",
                "description"=>"Early departure tolerance: 0m, Exceed: 17m",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Early departure"
            ],
            [
                "employee_id"=>"5",
                "anomaly_type_id"=>"4",
                "date"=>"2021-08-10",
                "level"=>"Timeslot 2",
                "description"=> "{\"theoretical_break_start\" : \"1970-02-01T14:00:00\",\"theoretical_break_end\" : \"1970-02-01T14:20:00\",\"practical_break_start\": \"2021-08-10T14:11:00\",\"practical_break_end\": \"2021-08-10T14:30:00\"}",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Fixed break not respected"
            ]
        ]);
    }

    public function test_daily_schedule_flexible_unrounded_without_break() {
        // Employee: 65, date: '09-08-2021'
        $this->authenticated();
        $employee_id = 65;
        $date = '2021-08-09';
        // Daily schedule
        $url = 'api/daily-schedules/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJson([
            "daily_schedule_id"=>"28",
            "name"=>"Horaires variable non arrondi sans pause",
            "type"=>"Variable",
            "abbreviation"=>"HVNASP",
            "max_counted_time"=>"17:00:00.0000000",
            "theorical_work_time"=>"16:00:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"0",
            "round_time"=>"0",
            "counted_work_time_night"=>"480",
            "timeslots"=> [
                [
                    "duration_start_end"=>"960",
                    "practical_total_duration"=>"960",
                    "theoretical_break_duration"=>"0",
                    "practical_break_duration"=>"0",
                    "delay_tolerance_unrespected"=>"0",
                    "delay_tolerance_unrespected_validated"=>"0",
                    "delay_tolerance_unrespected_justified"=>"0",
                    "delay_penalty_default"=>"15",
                    "practical_delay_penalty"=>"0",
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
                ],
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
            "daily_schedule_id"=>"28",
            "name"=>"Horaires variable non arrondi sans pause",
            "type"=>"Variable",
            "abbreviation"=>"HVNASP",
            "max_counted_time"=>"17:00:00.0000000",
            "theorical_work_time"=>"16:00:00.0000000",
            "early_arrival_counted"=>"1",
            "round_option"=>"0",
            "round_time"=>"0",
            "counted_work_time_night"=>"480",
            "timeslots"=> [
                [
                    "duration_start_end"=>"890",
                    "practical_total_duration"=>"890",
                    "theoretical_break_duration"=>"0",
                    "practical_break_duration"=>"0",
                    "delay_tolerance_unrespected"=>"1",
                    "delay_tolerance_unrespected_validated"=>"0",
                    "delay_tolerance_unrespected_justified"=>"0",
                    "delay_penalty_default"=>"15",
                    "practical_delay_penalty"=>"0",
                    "early_departure_tolerance_unrespected"=>"1",
                    "early_departure_tolerance_unrespected_validated"=>"0",
                    "early_departure_tolerance_unrespected_justified"=>"0",
                    "early_departure_penalty_default"=>"15","practical_early_departure_penalty"=>"5",
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
                ],
            ],
        ]);
        // Anomalies
        $url = 'api/anomalies/employee/'.$employee_id.'/date/'.$date;
        $response = $this->getJson($url);
        $response->assertStatus(200);
        $response->assertJsonCount(3);
        $response->assertJson([
            [
                "employee_id"=>"65",
                "anomaly_type_id"=>"9",
                "date"=>"2021-08-10",
                "level"=>"Daily schedule",
                "description"=>"Theoretical: 960 , Practical: 885",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Min work time not respected"
            ],
            [
                "employee_id"=>"65",
                "anomaly_type_id"=>"2",
                "date"=>"2021-08-10",
                "level"=>"Timeslot 1",
                "description"=>"Delay tolerance: 0m, Exceed: 60m",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Late arrival"
            ],
            [
                "employee_id"=>"65",
                "anomaly_type_id"=>"3",
                "date"=>"2021-08-10",
                "level"=>"Timeslot 1",
                "description"=>"Early departure tolerance: 0m, Exceed: 10m",
                "validated"=>"0",
                "show"=>"1",
                "type"=>"Early departure"
            ],
        ]);
    }
}
