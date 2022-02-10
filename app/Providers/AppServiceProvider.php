<?php

namespace App\Providers;

use App\Models\LeaveCounter;
use App\Models\Leave;
use App\Models\PublicHoliday;
use App\Observers\CounterObserver;
use App\Observers\JustificationObserver;
use App\Observers\LeaveCounterObserver;
use App\Observers\LeaveObserver;
use App\Observers\PublicHolidayObserver;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Queue;
use Laravel\Passport\Console\ClientCommand;
use Laravel\Passport\Console\InstallCommand;
use Laravel\Passport\Console\KeysCommand;
use Laravel\Passport\Passport;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Passport::routes();

        /*ADD THIS LINES*/
        $this->commands([
            InstallCommand::class,
            ClientCommand::class,
            KeysCommand::class,
        ]);

        Queue::looping(function () {
            while (DB::transactionLevel() > 0) {
                DB::rollBack();
            }
        });

        Queue::failing(function (JobFailed $event) {
            // error_log(json_encode($event->exception->getMessage()));
        });
    }
}
