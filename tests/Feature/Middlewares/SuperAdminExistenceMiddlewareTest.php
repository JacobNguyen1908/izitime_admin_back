<?php

namespace Tests\Feature\EmptyDB;

use Tests\TestCase;

use App\Http\Middleware\CheckSuperAdminExistence;
use App\Models\Address;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SuperAdminExistenceMiddlewareTest extends TestCase
{
    use DatabaseTransactions;

    public function test_super_admin_existence()
    {
        $userTypeAdmin = UserType::where('name', 'Super Administrator')->first();
        if (!User::where('user_type_id', $userTypeAdmin->id)->first()) {
            $response = $this->callMiddleware(CheckSuperAdminExistence::class);
            $response->assertJson(['message' => 'Could not find a super administrator.']);
            // Create super admin
            $address = factory(Address::class)->create();
            factory(User::class)->create([
                'address_id' => $address->id
            ]);
        }
        $response = $this->callMiddleware(CheckSuperAdminExistence::class);
        $response->assertMiddlewarePassed();
    }

}
