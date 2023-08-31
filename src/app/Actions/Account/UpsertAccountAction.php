<?php

namespace App\Actions\Account;

use App\DataTransferObjects\Account\AccountData;
use App\Models\Account;

final class UpsertAccountAction
{
    /**
     * @param $datum
     * @return Account
     */
    public static function execute($datum): Account
    {
        $data = AccountData::validateAndCreate($datum);

        return Account::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                'username' => $data->username,
                'office_id' => $data->office_id,
                'user_id' => $data->user_id,
            ],
        );
    }
}
