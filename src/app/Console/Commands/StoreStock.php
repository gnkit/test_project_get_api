<?php

namespace App\Console\Commands;

use App\Services\Stock\StockService;
use Illuminate\Console\Command;
use Throwable;

class StoreStock extends Command
{
    /**
     * @var string
     */
    protected $signature = 'store-stock {username} {dateFrom} {limit=500}';

    /**
     * @var string
     */
    protected $description = 'Stock store from external api';

    /**
     * @param StockService $service
     * @return void
     */
    public function handle(StockService $service): void
    {
        try {
            $username = $this->argument('username');
            $dateFrom = $this->argument('dateFrom');
            $limit = $this->argument('limit');

            if (500 < $limit) {
                $this->warn('Requests are limited (default 500).');
                $limit = 500;
            }

            $count = $service->store($username, $dateFrom, '', $limit);

            $message = 'Date: from ' . $dateFrom . PHP_EOL . 'Limit: ' . $limit . PHP_EOL . 'Count: ' . $count . PHP_EOL;

            $this->info('The command was successful!' . PHP_EOL . $message);

        } catch (Throwable $exception) {

            report($exception);
            $this->error('Requests failed. Try again later');
        }
    }
}
