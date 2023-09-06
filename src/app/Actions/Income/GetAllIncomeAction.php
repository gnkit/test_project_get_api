<?php

namespace App\Actions\Income;

use App\Models\Account;
use App\Models\Income;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

final class GetAllIncomeAction
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
            return Income::where('account_id', '=', $account->id)
                ->whereBetween('date', [$date, Carbon::tomorrow()->format('Y-m-d H:i:s'),])
                ->get();
        }

        return Income::where('account_id', '=', $account->id)->get();
    }
}
