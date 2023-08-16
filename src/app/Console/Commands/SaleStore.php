<?php

namespace App\Console\Commands;

use App\Services\Sale\SaleService;
use Illuminate\Console\Command;
use Throwable;

class SaleStore extends Command
{
    /**
     * @var string
     */
    protected $signature = 'app:sale-store {dateFrom} {dateTo} {limit=500}';

    /**
     * @var string
     */
    protected $description = 'Sale store from external api';

    /**
     * @param SaleService $saleService
     * @return void
     */
    public function handle(SaleService $saleService): void
    {
        try {
            $dateFrom = $this->argument('dateFrom');
            $dateTo = $this->argument('dateTo');
            $limit = $this->argument('limit');
            if (500 < $limit) {
                $this->warn('Requests are limited (default 500).');
                $limit = 500;
            }

            $count = $saleService->store($dateFrom, $dateTo, $limit);

            $message = 'Data: from ' . $dateFrom . ' to ' . $dateTo . ', Limit: ' . $limit . PHP_EOL . 'Count: ' . $count . PHP_EOL;

            $this->info('The command was successful!' . PHP_EOL . $message);

        } catch (Throwable $exception) {

            report($exception);
            $this->error('Requests failed. Try again later');
        }
    }
}
