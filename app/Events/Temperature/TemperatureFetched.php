<?php

namespace App\Events\Temperature;

use App\Events\DashboardEvent;

class TemperatureFetched extends DashboardEvent
{
    /** @var array */
    public $temperature;

    public function __construct(array $temperature)
    {
        $this->temperature = $temperature;
    }
}
