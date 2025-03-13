<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Jobs;
use Carbon\Carbon;

class ExpireJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jobs:expire';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark jobs as expired if their deadline has passed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $jobs = Jobs::where('status', 'active')
            ->where('deadline', '<', Carbon::now())
            ->update(['status' => 'expired']);

        $this->info('Expired jobs have been updated successfully.');
    }
}
