<?php

namespace App\Console\Commands;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TruncateOldNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete older records';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        News::where('created_at', '<', Carbon::now()->subDays(14))->each(function ($news) {
            $news->delete();
            info('News with Id:' . $news->id . 'has been removed');
        });
    }
}
