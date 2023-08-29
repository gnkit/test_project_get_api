<?php

namespace App\Actions\ApiService;

use App\DataTransferObjects\ApiService\ApiServiceData;
use App\Models\ApiService;

final class UpsertApiServiceAction
{
    /**
     * @param $datum
     * @return ApiService
     */
    public static function execute($datum): ApiService
    {
        $data = ApiServiceData::validateAndCreate($datum);

        return ApiService::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                'name' => $data->name,
            ],
        );
    }
}
