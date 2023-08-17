<?php

namespace App\Console\Commands;

use App\Services\Shared\DataService;
use Illuminate\Console\Command;
use Throwable;

class BaseStore extends Command
{
    /**
     * @var string
     */
    protected $signature = 'app:store {endpoint} {dateFrom} {dateTo=null} {limit=500}';

    /**
     * @var string
     */
    protected $description = 'Data store from external api';

    /**
     * @param DataService $service
     * @return void
     */
    public function handle(DataService $service): void
    {
        try {
            $endpoint = $this->argument('endpoint');
            $dateFrom = $this->argument('dateFrom');
            $dateTo = $this->argument('dateTo');
            $limit = $this->argument('limit');
            if (500 < $limit) {
                $this->warn('Requests are limited (default 500).');
                $limit = 500;
            }

            $count = $service->storeService($endpoint, $dateFrom, $dateTo, $limit);

            $message = 'Date: from ' . $dateFrom . ($dateTo === null ? ' to ' . $dateTo : '') . PHP_EOL . 'Limit: ' . $limit . PHP_EOL . 'Count: ' . $count . PHP_EOL;

            $this->info('The command was successful!' . PHP_EOL . $message);

        } catch (Throwable $exception) {

            report($exception);
            $this->error('Requests failed. Try again later');
        }
    }
}
