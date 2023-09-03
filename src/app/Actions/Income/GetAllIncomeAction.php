<?php

namespace App\Actions\Income;

use App\Models\Account;
use App\Models\Income;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

final class GetAllIncomeAction
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
            return Income::where('account_id', '=', $account->id)
                ->whereBetween('created_at', [$date, Carbon::tomorrow()->format('Y-m-d H:i:s'),])
                ->paginate(50);
        }

        return Income::where('account_id', '=', $account->id)->paginate(50);
    }
}
