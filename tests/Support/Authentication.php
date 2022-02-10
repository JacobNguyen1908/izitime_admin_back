<?php

namespace Tests\Support;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Tests\TestCase;

trait Authentication
{
    /** @var User $user **/
    protected $user;

    public function setupUser()
    {
        $this->user = factory(User::class)->create();
    }

    public function authenticated(Authenticatable $user = null)
    {
        return $this->actingAs($user ?? $this->user, 'api');
    }
}
