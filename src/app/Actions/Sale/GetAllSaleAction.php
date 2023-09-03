<?php

namespace App\Actions\Sale;

use App\Models\Account;
use App\Models\Sale;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

final class GetAllSaleAction
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
            return Sale::where('account_id', '=', $account->id)
                ->whereBetween('created_at', [$date, Carbon::tomorrow()->format('Y-m-d H:i:s'),])
                ->paginate(50);
        }

        return Sale::where('account_id', '=', $account->id)->paginate(50);
    }
}
