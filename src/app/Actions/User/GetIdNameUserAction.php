<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Collection;

final class GetIdNameUserAction
{
    /**
     * @param $name
     * @param $id
     * @return Collection
     */
    public static function execute($name, $id): Collection
    {
        return User::pluck($name, $id);
    }
}
