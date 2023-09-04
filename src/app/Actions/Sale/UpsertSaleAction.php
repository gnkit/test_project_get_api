<?php

namespace App\Actions\Sale;

use App\DataTransferObjects\Sale\SaleData;
use App\Models\Account;
use App\Models\Sale;

final class UpsertSaleAction
{
    /**
     * @param $datum
     * @param $username
     * @return mixed
     */
    public static function execute($datum, $username)
    {
        $account = Account::where('username', '=', $username)->first();

        $sale = Sale::where([
            ['g_number', '=', $datum->g_number],
            ['account_id', '=', $account->id],
        ])->first();

        if ($sale) {
            $datum->account_id = $sale->account_id;
            $data = SaleData::from($datum);
            return $sale->update([...$data->all()]);
        } else {
            $datum->account_id = $account->id;
            $data = SaleData::from($datum);
            return Sale::create([...$data->all()]);
        }
    }
}
