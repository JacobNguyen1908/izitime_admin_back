<?php

namespace Tests\Support;

use App\Models\User;
use App\Models\Company_setting;
use Illuminate\Contracts\Auth\Authenticatable;

trait FirstSetup
{
    protected $company;
    protected $user;

    /**
     * @before
     */
    public function appFirstSetup()
    {
        $this->afterApplicationCreated(function () {
            if (sizeof(Company_setting::all()) === 0) {
                $this->company = factory(Company_setting::class)->create();
            }
            $this->user = factory(User::class)->create();
        });
    }

    public function authenticated(Authenticatable $user = null)
    {
        return $this->actingAs($this->user, 'api');
    }
}
