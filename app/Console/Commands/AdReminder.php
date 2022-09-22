<?php

namespace App\Console\Commands;

use App\Models\Advertising\Ad;
use App\Notifications\AdNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class AdReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advertisers:ad-reminder';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remind advertiser one day before ad';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::parse(now())->toDateString();
        $ads = Ad::where('start_date', Carbon::parse($today)->addDay())->get();

        foreach ($ads as $ad) {
            $ad->advertiser->notify(new AdNotification($ad->title));
        }
    }
}
