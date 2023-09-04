<?php

namespace App\Actions\Order;

use App\Models\Account;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

final class GetAllOrderAction
{
    /**
     * @param $username
     * @param $date
     * @return Collection
     */
    public static function execute($username, $date):Collection
    {
        $account = Account::where('username', '=', $username)->first();

        if (null !== $date) {
            return Order::where('account_id', '=', $account->id)
                ->whereBetween('created_at', [$date, Carbon::tomorrow()->format('Y-m-d H:i:s'),])
                ->get();
        }

        return Order::where('account_id', '=', $account->id)->get();
    }
}
