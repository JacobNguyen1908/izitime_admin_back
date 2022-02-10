<?php

namespace Tests\Feature\EmptyDB;

use App\Models\Address;
use App\Models\Company_setting;
use App\Models\User;
use App\Models\UserRights;
use App\Models\UserType;
use App\Models\UserTypeRights;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTypeTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp():void {
        parent::setUp();
        // Create company
        $this->addressCompany = factory(Address::class)->create();
        $this->company = factory(Company_setting::class)->create([
            'address_id' => $this->addressCompany->id
        ]);
        // Create super admin
        $this->addressAdmin = factory(Address::class)->create();
        $this->admin = factory(User::class)->create([
            'address_id' => $this->addressAdmin->id,
            'user_type_id' => UserType::where('name','Super Administrator')->find(1)->id
        ]);
        // Create non admin
        $this->addressNonAdmin = factory(Address::class)->create();
        $this->userTypeNonAdmin = factory(UserType::class)->create();
        $this->nonAdmin = factory(User::class)->create([
            'address_id' => $this->addressNonAdmin->id,
            'user_type_id' => $this->userTypeNonAdmin->id
        ]);
        $this->rights = factory(UserRights::class)->create();
        $this->nonAdminTypeRights = factory(UserTypeRights::class)->create([
            'user_type_id' => $this->userTypeNonAdmin->id,
            'user_right_id' => $this->rights->id
        ]);
    }

    /**
     * Test if user is not super admin
     * Expect message error
     */
    public function test_non_admin() {
        $this->actingAs($this->nonAdmin, 'api');
        $response = $this->postJson('api/user-type', [
            'name' => 'Test POST user type'
        ]);
        $response->assertStatus(403);
        $response->assertJson(['message' => 'You are not a super administrator.']);
    }

    /******************************* TEST AS ADMIN *********************************
     * Because only admin can interact with users of this application
    */

    public function test_can_create_user_type() {
        $this->actingAs($this->admin, 'api');
        $response = $this->postJson('api/user-type', [
            'name' => 'Test POST user type'
        ]);
        // Check response
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'User type successfully created',
            'success' => true,
        ]);
        // Check in database
        $this->assertDatabaseHas('user_types', [
            'name' => 'Test POST user type'
        ]);
    }

    public function test_can_get_all_user_type() {
        $this->actingAs($this->admin, 'api');
        $response = $this->json('GET','api/user-type');
        // Check response
        $response->assertStatus(200);
        $response->assertJson([]);
    }

    public function test_can_get_user_type_by_id() {
        $this->actingAs($this->admin, 'api');
        $route = 'api/user-type/'.$this->userTypeNonAdmin->id;
        $response = $this->json('GET',$route);
        // Check response
        $response->assertStatus(200);
        $response->assertJson([
            'id' =>  true,
            'name' => true
        ]);
    }

    public function test_can_delete_user_type() {
        $this->actingAs($this->admin, 'api');
        $route = 'api/user-type/'.$this->userTypeNonAdmin->id;
        $response = $this->json('DELETE',$route);
        // Check response
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'User type successfully deleted'
        ]);
        // Check in database
        $this->assertDatabaseMissing('user_types', [
            'id' => $this->userTypeNonAdmin->id
        ]);
    }

    public function test_can_update_user_type() {
        $this->actingAs($this->admin, 'api');
        $route = 'api/user-type/'.$this->userTypeNonAdmin->id;
        $response = $this->json('PUT',$route, [
            'name' => 'Test PUT user type'
        ]);
        // Check response
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'User type successfully updated'
        ]);
        // Check in database
        $this->assertDatabaseHas('user_types', [
            'id' => $this->userTypeNonAdmin->id,
            'name' => 'Test PUT user type'
        ]);
    }
}
