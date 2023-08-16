<?php

namespace App\Console\Commands;

use App\Services\Order\OrderService;
use Illuminate\Console\Command;
use Throwable;

class OrderStore extends Command
{
    /**
     * @var string
     */
    protected $signature = 'app:order-store {dateFrom} {dateTo} {limit=500}';

    /**
     * @var string
     */
    protected $description = 'Order store from external api';

    /**
     * @param OrderService $orderService
     * @return void
     */
    public function handle(OrderService $orderService): void
    {
        try {
            $dateFrom = $this->argument('dateFrom');
            $dateTo = $this->argument('dateTo');
            $limit = $this->argument('limit');
            if (500 < $limit) {
                $this->warn('Requests are limited (default 500).');
                $limit = 500;
            }

            $key = config('services.laravel_api.key');

            $count = $orderService->store($dateFrom, $dateTo, $key, $limit);

            $message = 'Data: from ' . $dateFrom . ' to ' . $dateTo . ', Limit: ' . $limit . PHP_EOL . 'Count: ' . $count . PHP_EOL;

            $this->info('The command was successful!' . PHP_EOL . $message);

        } catch (Throwable $exception) {

            report($exception);
            $this->error('Requests failed. Try again later');
        }
    }
}
