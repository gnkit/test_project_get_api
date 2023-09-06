<?php

namespace App\Actions\Sale;

use App\Models\Account;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

final class GetAllSaleAction
{
    /**
     * @param $username
     * @param $date
     * @return Collection
     */
    public static function execute($username, $date): Collection
    {
        $account = Account::where('username', '=', $username)->first();

        if (null !== $date) {
            return Sale::where('account_id', '=', $account->id)
                ->whereBetween('date', [$date, Carbon::tomorrow()->format('Y-m-d H:i:s'),])
                ->get();
        }

        return Sale::where('account_id', '=', $account->id)->get();
    }
}
