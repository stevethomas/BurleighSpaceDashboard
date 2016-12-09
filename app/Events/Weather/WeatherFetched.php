<?php

namespace App\Events\Weather;

use App\Events\DashboardEvent;

class WeatherFetched extends DashboardEvent
{
    /** @var array */
    public $weather;

    public function __construct(array $weather)
    {
        $this->weather = $weather;
    }
}
