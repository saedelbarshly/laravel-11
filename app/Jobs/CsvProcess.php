<?php

namespace App\Jobs;

use Throwable;
use App\Models\Organization;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CsvProcess implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $header , public $data)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    { 
        foreach ($this->data as $item) {
            $org = array_combine($this->header, $item);
            Organization::create($org);
        }
    }

        /**
     * Handle a job failure.
     */
    public function failed(?Throwable $exception): void
    {
        // Send user notification of failure, etc...
    }
}
