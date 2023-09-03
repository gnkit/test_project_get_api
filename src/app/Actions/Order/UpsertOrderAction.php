<?php

namespace App\Actions\Order;

use App\DataTransferObjects\Order\OrderData;
use App\Models\Account;
use App\Models\Order;

final class UpsertOrderAction
{
    /**
     * @param $datum
     * @param $username
     * @return mixed
     */
    public static function execute($datum, $username)
    {
        $account = Account::where('username', '=', $username)->first();

        $order = Order::where([
            ['g_number', '=', $datum->g_number],
            ['account_id', '=', $account->id],
        ])->first();

        if ($order) {
            $datum->account_id = $order->account_id;
            $data = OrderData::from($datum);
            return $order->save([...$data->all()]);
        } else {
            $datum->account_id = $account->id;
            $data = OrderData::from($datum);
            return Order::create([...$data->all()]);
        }
    }
}
