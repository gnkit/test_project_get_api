<?php

namespace App\Actions\Stock;

use App\DataTransferObjects\Stock\StockData;
use App\Models\Account;
use App\Models\Stock;

final class UpsertStockAction
{
    /**
     * @param $datum
     * @param $username
     * @return mixed
     */
    public static function execute($datum, $username)
    {
        $account = Account::where('username', '=', $username)->first();

        $stock = Stock::where([
            ['barcode', '=', $datum->barcode],
            ['supplier_article', '=', $datum->supplier_article],
            ['account_id', '=', $account->id],
        ])->first();

        if ($stock) {
            $datum->account_id = $stock->account_id;
            $data = StockData::from($datum);
            return $stock->update([...$data->all()]);
        } else {
            $datum->account_id = $account->id;
            $data = StockData::from($datum);
            return Stock::create([...$data->all()]);
        }
    }
}
