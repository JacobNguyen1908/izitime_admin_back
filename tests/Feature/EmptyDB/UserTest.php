<?php

namespace Tests\Unit;

use App\Models\Address;
use App\Models\Company_setting;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Carbon\Carbon;
use DB;
use Tests\Support\FirstSetup;

class UserTest extends TestCase
{
    use FirstSetup, DatabaseTransactions;

    public function setUp():void {
        parent::setUp();
        // Create company
        $this->addressCompany = factory(Address::class)->create();
        $this->company = factory(Company_setting::class)->create([
            'address_id' => $this->addressCompany->id
        ]);
        $this->browser_timezone = 'Europe/Paris';
    }

    // public function test_can_login() {
    //     $user = factory(User::class)->create([
    //         'password' => bcrypt($password = 'password'),
    //         'address_id' => null
    //     ]);
    //     $guest = factory(User::class)->create([
    //         'password' => bcrypt($password = 'password'),
    //         'address_id' => null
    //     ]);
    //     $response = $this->postJson('api/auth/login', [
    //         'email' => $user->email,
    //         'password' => $password,
    //         'browser_timezone' => $this->browser_timezone
    //     ]);
    //     $fail = $this->postJson('api/auth/login', [
    //         'email' => $guest->email,
    //         'password' => 'invalid',
    //         'browser_timezone' => $this->browser_timezone
    //     ]);
    //     // Check response
    //     $response->assertStatus(200);
    //     $response->assertJson([
    //         "access_token" => true,
    //         'token_type' => 'Bearer',
    //         'expires_at' => true
    //     ]);
    //     // Check response
    //     $fail->assertStatus(401); // Or assertUnauthorized()
    //     $fail->assertJson([
    //         'message' => 'Unauthorized'
    //     ]);
    //     // Check authenticate
    //     $this->assertAuthenticatedAs($user);
    // }

    // public function test_can_logout() {
    //     $user = factory(User::class)->create([
    //         'password' => bcrypt($password = 'password'),
    //         'address_id' => null
    //     ]);
    //     $login = $this->postJson('api/auth/login', [
    //         'email' => $user->email,
    //         'password' => $password,
    //         'browser_timezone' => $this->browser_timezone
    //     ]);
    //     // $this->actingAs($user, 'api');
    //     $token = $login['access_token'];
    //     $response = $this->withHeaders(['Authorization' => 'Bearer '.$token])->getJson('api/auth/logout');
    //     $response->assertStatus(200);
    //     $response->assertJson([
    //         'message' => 'Successfully logged out'
    //     ]);
    // }

    /****************************************************** CRUD ***********************************************************/
    // public function test_can_create_user() {
    //     $this->authenticated();
    //     $response = $this->postJson('api/users', [
    //         'name' => 'Test POST user',
    //         'email' => 'test@gmail.com',
    //         'password' => 'testPassword',
    //         'password_confirmation' => 'testPassword'
    //     ]);
    //     // Check response
    //     $response->assertStatus(200);
    //     $response->assertJson([
    //         'success'=> [
    //             'token' => true,
    //             'name' => true
    //         ],
    //         'message' => 'User successfully created.'
    //     ]);
    //     // Check in database
    //     $this->assertDatabaseHas('users', [
    //         'name' => 'Test POST user'
    //     ]);
    // }

    public function test_can_get_all_users() {
        $this->authenticated();
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'password'),
            'address_id' => null
        ]);
        $guest = factory(User::class)->create([
            'password' => bcrypt($password = 'password'),
            'address_id' => null
        ]);
        $response = $this->json('GET','api/users');
        // Check response
        $response->assertStatus(200);
        $response->assertJsonCount(User::count());
    }


    public function test_can_delete_user() {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'password'),
            'address_id' => null
        ]);
        $this->authenticated();
        $nbUsers = $this->json('GET','api/users');
        $nbUsers->assertJsonCount(User::count());
        $route = 'api/users/'.$user->id;
        $response = $this->json('DELETE',$route);
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'User successfully deleted'
        ]);
        // $this->assertDeleted('users', $user->toArray());
        $nbUsers = $this->json('GET','api/users');
        $nbUsers->assertJsonCount(User::count());
    }

    public function test_can_update_user() {
        $this->authenticated();
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'password'),
            'address_id' => null
        ]);
        $route = 'api/users/'.$user->id;
        $response = $this->json('PUT',$route, [
            'name' => 'Test PUT user name',
            'dob' => Carbon::parse('19-8-1996'),
            'phone' => '01231469745',
            'email' => 'test@gmail.com',
            'address_line_1' => 'Test PUT address user',
            'address_line_2' => 'Test PUT address user',
            'zipcode' => 'Test PUT zipcode user',
            'city' => 'Test PUT city user',
            'country' => 'Test PUT country user'
        ]);
        // Check response
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'User successfully updated'
        ]);
        // Check in database
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Test PUT user name',
            'phone' => '01231469745',
            'email' => 'test@gmail.com',
        ]);
        $this->assertDatabaseHas('addresses', [
            'address_line_1' => 'Test PUT address user',
            'address_line_2' => 'Test PUT address user',
            'zip_code' => 'Test PUT zipcode user',
            'city' => 'Test PUT city user',
            'country' => 'Test PUT country user'
        ]);
    }
}
