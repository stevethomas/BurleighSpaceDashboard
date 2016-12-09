<?php

namespace App\Components\Temperature;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use App\Events\Temperature\TemperatureFetched;

class FetchInsideTemperature extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'dashboard:inside';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the temperature from Temperature API.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $responseBody = json_decode((new Client())->request('GET', config('services.temperature.endpoint'), [
            'headers' => ['accept' => 'application/json'],
            'query' => ['api_token' => config('services.temperature.secret')]
        ])->getBody(), true);

        event(new TemperatureFetched($responseBody));
    }
}
