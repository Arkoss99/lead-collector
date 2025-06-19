<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Jobs\GenerateDailyStatsExcel;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::job(new GenerateDailyStatsExcel(now()->subDay()->toDateString()))->dailyAt('9:47')->timezone("Europe/Prague")->name('generate-daily-stats-excel');


