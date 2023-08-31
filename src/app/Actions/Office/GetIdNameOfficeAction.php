<?php

namespace App\Actions\Office;

use App\Models\Office;
use Illuminate\Support\Collection;

final class GetIdNameOfficeAction
{
    /**
     * @param $name
     * @param $id
     * @return Collection
     */
    public static function execute($name, $id): Collection
    {
        return Office::pluck($name, $id);
    }
}
