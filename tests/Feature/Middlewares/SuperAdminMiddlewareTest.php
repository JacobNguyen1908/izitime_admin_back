<?php

namespace Tests\Feature\EmptyDB;

use Tests\TestCase;

use App\Http\Middleware\CheckIfSuperAdmin;
use App\Models\Address;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SuperAdminMiddlewareTest extends TestCase
{
    use DatabaseTransactions;

    public function test_non_admin()
    {
        $userTypeNonAdmin = factory(UserType::class)->create();
        $nonAdmin = factory(User::class)->create([
            'user_type_id' => $userTypeNonAdmin->id
        ]);
        $response = $this->actingAs($nonAdmin)->callMiddleware(CheckIfSuperAdmin::class);
        $response->assertJson(['message' => 'You are not a super administrator.']);
    }

    public function test_admin()
    {
        $admin = factory(User::class)->create();
        $response = $this->actingAs($admin)->callMiddleware(CheckIfSuperAdmin::class);
        $response->assertMiddlewarePassed();
    }

}
