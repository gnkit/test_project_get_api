<?php

namespace App\Actions\Company;

use App\DataTransferObjects\Company\CompanyData;
use App\Models\Company;

final class UpsertCompanyAction
{
    /**
     * @param $datum
     * @return Company
     */
    public static function execute($datum): Company
    {
        $data = CompanyData::validateAndCreate($datum);

        return Company::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                'name' => $data->name,
            ],
        );
    }
}
