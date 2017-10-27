<?php

namespace App\Components\BurleighSpace;

use DateTime;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Events\BurleighSpace\MeetingsFetched;

class FetchBurleighSpaceMeetings extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'dashboard:meetings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Burleigh Space meetings.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $meetings = collect(json_decode(file_get_contents(config('services.meetings.endpoint')), true))
            ->map(function ($meeting) {
                return [
                    'name' => $meeting['user']['firstname'],
                    'starts' => (string) Carbon::createFromFormat('Y-m-d H:i:s', $meeting['starts']),
                    'ends' => (string) Carbon::createFromFormat('Y-m-d H:i:s', $meeting['ends']),
                ];
            })->toArray();

        event(new MeetingsFetched($meetings));
    }
}
