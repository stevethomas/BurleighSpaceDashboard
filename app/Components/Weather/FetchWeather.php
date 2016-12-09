<?php

namespace App\Components\Weather;

use Illuminate\Console\Command;
use App\Events\Weather\WeatherFetched;

class FetchWeather extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'dashboard:outside';

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
        $xml = simplexml_load_file('http://rss.weather.com.au/qld/gold-coast');
        $xml->registerXPathNamespace('w', 'http://rss.weather.com.au/w.dtd');

        // in todays weather...
        $current = $xml->xpath("//w:current")[0];

        $weather = [
            'current' => [
                'temperature' => number_format((string)$current['temperature'], 1),
                'wind' => number_format((string)$current['windSpeed'], 1),
                'windDirection' => (string)$current['windDirection'],
                'rain' => number_format((string)$current['rain'], 1),
            ]
        ];

        // 3 day outlook
        for ($i = 0; $i < 3; $i++) {
            $forecast = $xml->xpath("//w:forecast")[$i];

            $weather['forecasts'][] = [
                'day' => (string)$forecast['day'],
                'description' => (string)$forecast['description'],
                'max' => number_format((string)$forecast['max'], 1),
            ];
        }

        event(new WeatherFetched($weather));
    }
}
