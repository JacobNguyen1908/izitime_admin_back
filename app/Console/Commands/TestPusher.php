<?php

namespace App\Console\Commands;

use App\Events\GenerateStatisticEvent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class TestPusher extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:pusher';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Pusher Broadcast';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user_id = Auth::id();
        event(new GenerateStatisticEvent($user_id, 'failed'));
    }
}
