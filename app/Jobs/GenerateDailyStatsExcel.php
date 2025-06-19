<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DailyLeadStatsExport;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateDailyStatsExcel implements ShouldQueue
{
    use Queueable, Dispatchable;
    protected string $date;

    public function __construct($date = null)
    {
         $this->date = $date;
    }


    public function handle(): void
    {
            Excel::store(
            new DailyLeadStatsExport($this->date),
            "lead-stats/daily-stats-{$this->date}.xlsx",
            'public'
        );
    }
}
