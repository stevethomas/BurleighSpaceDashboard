<?php

namespace App\Events\News;

use App\Events\DashboardEvent;

class NewsFetched extends DashboardEvent
{
    /** @var array */
    public $news;

    public function __construct(array $news)
    {
        $this->news = $news;
    }
}
