<?php

namespace App\Console\Commands;

use App\Services\Order\OrderService;
use Illuminate\Console\Command;
use Throwable;

class StoreOrder extends Command
{
    /**
     * @var string
     */
    protected $signature = 'store-order {username} {dateFrom} {dateTo} {limit=500}';

    /**
     * @var string
     */
    protected $description = 'Order store from external api';

    /**
     * @param OrderService $service
     * @return void
     */
    public function handle(OrderService $service): void
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

            report($exception);
            $this->error('Requests failed. Try again later');
        }
    }
}
