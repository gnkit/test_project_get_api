<?php

namespace App\Actions\ApiService;

use App\Models\ApiService;

final class GetIdNameTypeTokenOfApiServiceAction
{
    /**
     * @param $api_service_id
     * @return array
     */
    public static function execute($api_service_id): array
    {
        $api_service = ApiService::find($api_service_id);

        $types = [];
        foreach ($api_service->tokenTypes as $tokenType) {
            $types[$tokenType->id] = $tokenType->name;
        }

        return $types;
    }
}
