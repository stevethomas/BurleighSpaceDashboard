<?php

namespace App\Events\BurleighSpace;

use App\Events\DashboardEvent;

class MeetingsFetched extends DashboardEvent
{
    /** @var array */
    public $meetings;

    public function __construct(array $meetings)
    {
        $this->meetings = $meetings;
    }
}
