<?php

namespace App\Actions\ApiService;

use App\Models\ApiService;
use Illuminate\Support\Collection;

final class GetIdNameApiServiceAction
{
    /**
     * @param $name
     * @param $id
     * @return Collection
     */
    public static function execute($name, $id): Collection
    {
        return ApiService::pluck($name, $id);
    }
}
