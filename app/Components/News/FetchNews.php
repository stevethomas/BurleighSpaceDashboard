<?php

namespace App\Components\News;

use App\Events\News\NewsFetched;
use Illuminate\Console\Command;

class FetchNews extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'dashboard:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the latest news from the ABC.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $xml = simplexml_load_file('http://www.abc.net.au/news/feed/45910/rss.xml');
        $xml->registerXPathNamespace('dc', 'http://purl.org/dc/elements/1.1/');

        $news = [];

        $stories = $xml->xpath("//item");

        foreach ($stories as $story) {
            $news[] = [
                'title' => (string)$story->title,
                'tags' => array_slice((array)$story->category, 0, 1),
            ];
        }

        event(new NewsFetched($news));
    }
}
