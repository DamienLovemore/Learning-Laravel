<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Job;

class TranslateJob implements ShouldQueue
{
    use Queueable;

    private Job $job_listing;

    /**
     * Create a new job instance.
     */
    public function __construct(Job $job)
    {
        $this->job_listing = $job;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $msg = __("Job Page");
        $msg .= (" - " . __($this->job_listing->title));

        logger($msg);
    }
}
