<?php

namespace App\Actions\Income;

use App\DataTransferObjects\Income\IncomeData;
use App\Models\Account;
use App\Models\Income;

final class UpsertIncomeAction
{
    /**
     * @param $datum
     * @param $username
     * @return mixed
     */
    public static function execute($datum, $username)
    {
        $account = Account::where('username', '=', $username)->first();

        $income = Income::where([
            ['income_id', '=', $datum->income_id],
            ['account_id', '=', $account->id],
        ])->first();

        if ($income) {
            $datum->account_id = $income->account_id;
            $data = IncomeData::from($datum);
            return $income->save([...$data->all()]);
        } else {
            $datum->account_id = $account->id;
            $data = IncomeData::from($datum);
            return Income::create([...$data->all()]);
        }
    }
}
