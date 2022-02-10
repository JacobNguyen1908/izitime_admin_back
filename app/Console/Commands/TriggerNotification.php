<?php

namespace App\Console\Commands;

use App\Models\Anomaly;
use App\Models\User;
use App\Notifications\AnomalyNotification;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class TriggerNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trigger:notification_from_db {anomaly*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trigger notification to client by database';

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
        $anomalies_id = $this->argument('anomaly');
        // error_log(json_encode($anomalies_id));
        $admins = User::whereHas('user_type', function (Builder $query) {
            $query->where('id', 1);
        })->get();
        foreach($anomalies_id as $id) {
            $anomaly = Anomaly::find(+$id);
            // error_log(json_encode($anomaly));
            FacadesNotification::send($admins, new AnomalyNotification($anomaly));
        }
    }
}
