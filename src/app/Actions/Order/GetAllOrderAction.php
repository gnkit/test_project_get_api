<?php

namespace App\Actions\Order;

use App\Models\Account;
use App\Models\Order;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

final class GetAllOrderAction
{
    /**
     * @param $username
     * @param $date
     * @return LengthAwarePaginator
     */
    public static function execute($username, $date): LengthAwarePaginator
    {
        $account = Account::where('username', '=', $username)->first();

        if (null !== $date) {
            return Order::where('account_id', '=', $account->id)
                ->whereBetween('created_at', [$date, Carbon::tomorrow()->format('Y-m-d H:i:s'),])
                ->paginate(50);
        }

        return Order::where('account_id', '=', $account->id)->paginate(50);
    }
}
