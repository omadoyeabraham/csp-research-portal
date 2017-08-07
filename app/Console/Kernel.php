<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        
        // Cron Job used to pull in latest google news feeds every 10 minutes
        $schedule->call(function(){
                    try {
                            $news = simplexml_load_file('http://news.google.com/news?pz=1&cf=all&ned=en_ng&hl=en&topic=b&output=rss');
                            $c = 0; $limit = 5; $newsResult = [];  $i = 1;
                            foreach ($news->channel->item as $item)
                             {
                                if ($c < $limit) {
                                    $r = array(
                                        'link' => strip_tags($item->link),
                                        'title' => strip_tags($item->title),
                                        'id' => $i++
                                    );
                                    array_push( $newsResult, $r);
                            }
                            $c +=1;
                       }

                        } catch (\Exception $e) {
                             $newsResult = null;
                        }

                        if( !is_null($newsResult) )
                        {
                            $fileLocation = base_path('resources/data-files/google-news-feed.txt');
                            $newsFile = fopen($fileLocation, "w+");
                            fwrite($newsFile, serialize($newsResult) );
                            fclose($newsFile);
                        }

        })->everyFiveMinutes();

        //$schedule->command('inspire');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
