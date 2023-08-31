<?php

namespace App\Actions\Company;

use App\Models\Company;
use Illuminate\Support\Collection;


final class GetIdNameCompanyAction
{
    /**
     * @param $name
     * @param $id
     * @return Collection
     */
    public static function execute($name, $id): Collection
    {
        return Company::pluck($name, $id);
    }
}
