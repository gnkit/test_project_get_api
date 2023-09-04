<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\Income;
use App\Models\Order;
use App\Models\Sale;
use App\Models\Stock;
use App\Services\Income\IncomeService;
use App\Services\Order\OrderService;
use App\Services\Sale\SaleService;
use App\Services\Stock\StockService;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Throwable;

class UpdateAllData extends Command
{
    /**
     * @var string
     */
    protected $signature = 'update-data';

    /**
     * @var string
     */
    protected $description = 'Update all data from external api';

    /**
     * @param OrderService $orderService
     * @param SaleService $saleService
     * @param IncomeService $incomeService
     * @param StockService $stockService
     * @return void
     */
    public function handle(
        OrderService  $orderService,
        SaleService   $saleService,
        IncomeService $incomeService,
        StockService  $stockService)
    {
        try {
            $accounts = Account::select('id', 'username', 'user_id')->get();
            $orderDateFrom = substr(Order::first()->created_at, 0, 10);
            $saleDateFrom = substr(Sale::first()->created_at, 0, 10);
            $incomeDateFrom = substr(Income::first()->created_at, 0, 10);
            $stockDateFrom = substr(Stock::first()->created_at, 0, 10);
            $dateTo = Carbon::today()->toDateString();
            $limit = 500;

            $count = [];
            foreach ($accounts as $account) {
                $count['order'] = $orderService->store($account->username, $orderDateFrom, $dateTo, $limit);
                $count['sale'] = $saleService->store($account->username, $saleDateFrom, $dateTo, $limit);
                $count['income'] = $incomeService->store($account->username, $incomeDateFrom, $dateTo, $limit);
                $count['stock'] = $stockService->store($account->username, $dateTo, '', $limit);
            }

            Log::info("Cron is working fine!");
            $this->info('The command was successful!' . PHP_EOL
                . $count['order'] . PHP_EOL
                . $count['sale'] . PHP_EOL
                . $count['income'] . PHP_EOL
                . $count['stock'] . PHP_EOL);

        } catch (Throwable $exception) {

            report($exception);
            $this->error('Requests failed. Try again later' . PHP_EOL
                . $exception->getCode() . PHP_EOL
                . $exception->getMessage() . PHP_EOL);
        }
    }
}
