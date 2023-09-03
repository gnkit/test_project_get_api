<?php

namespace App\Console\Commands;

use App\Services\Sale\SaleService;
use Illuminate\Console\Command;
use Throwable;

class StoreSale extends Command
{
    /**
     * @var string
     */
    protected $signature = 'store-sale {username} {dateFrom} {dateTo} {limit=500}';

    /**
     * @var string
     */
    protected $description = 'Sale store from external api';

    /**
     * @param SaleService $service
     * @return void
     */
    public function handle(SaleService $service): void
    {
        try {
            $username = $this->argument('username');
            $dateFrom = $this->argument('dateFrom');
            $dateTo = $this->argument('dateTo');
            $limit = $this->argument('limit');

            if (500 < $limit) {
                $this->warn('Requests are limited (default 500).');
                $limit = 500;
            }

            $count = $service->store($username, $dateFrom, $dateTo, $limit);

            $message = 'Date: from ' . $dateFrom . ' to ' . $dateTo . PHP_EOL . 'Limit: ' . $limit . PHP_EOL . 'Count: ' . $count . PHP_EOL;

            $this->info('The command was successful!' . PHP_EOL . $message);

        } catch (Throwable $exception) {
dd($exception);
            report($exception);
            $this->error('Requests failed. Try again later');
        }
    }
}
