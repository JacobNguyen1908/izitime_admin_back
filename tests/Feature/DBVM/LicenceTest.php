<?php

namespace Tests\Feature\DBVM;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Support\FirstSetup;
use Tests\TestCase;

class LicenceTest extends TestCase
{
    use DatabaseTransactions, FirstSetup;

    public function setUp():void {
        parent::setUp();
    }

    public function test_can_create_new_record_licences() {
        $this->authenticated();
        $data = [
            'nb_employees' => 100,
            'licence_users' => true,
            'licence_leaves' => true,
            'licence_planning' => true,
            'licence_cumulative_variance' => true,
            'licence_public_holidays' => true,
        ];
        $response = $this->postJson('api/licences', $data);
        $response->assertJson([
            'message' => 'Licences successfully updated'
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('Licences', [
            'nb_employees' => 100,
            'licence_users' => true,
            'licence_leaves' => true,
            'licence_planning' => true,
            'licence_cumulative_variance' => true,
            'licence_public_holidays' => true
        ]);
    }
}
