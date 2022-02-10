<?php

namespace App\Console\Commands;

use App\Events\GenerateStatisticEvent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TestMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Mail';

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
        try {
            Mail::raw('Hello World!', function($msg) {$msg->to('baonguyen06091996@gmail.com')->subject('Test Email'); });
           } catch(\Swift_TransportException $e){
              if($e->getMessage()) {
                 dd($e->getMessage());
              }
           }

    }
}
