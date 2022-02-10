<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Http\Middleware\Authenticate;
use App\Models\Address;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthMiddlewareTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test request pass only for users who are authenticated
     *
     * @return void
     */
    public function test_request_pass_for_authenticated_users()
    {
        $address = factory(Address::class)->create();
        $user = factory(User::class)->create([
            'address_id' => $address->id
        ]);
        $response = $this->actingAs($user)->callMiddleware(Authenticate::class);
        $response->assertMiddlewarePassed();
    }

    /**
     * Test request cannot pass for users who are not authenticated
     *
     * @return void
     */
    public function test_request_cannot_pass_unauthenticated_users()
    {
        $response = $this->callMiddleware(Authenticate::class);
        $response->assertRedirect(route('login'));
    }
}
