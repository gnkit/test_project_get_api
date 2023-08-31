<?php

namespace App\Actions\Account;

use App\Models\Account;
use Illuminate\Support\Collection;

final class GetIdUsernameAccountAction
{
    /**
     * @param $username
     * @param $id
     * @return Collection
     */
    public static function execute($username, $id): Collection
    {
        return Account::pluck($username, $id);
    }
}
