<?php

namespace App\Actions\Token;

use App\DataTransferObjects\Token\TokenData;
use App\Models\Token;

final class UpsertTokenAction
{
    /**
     * @param $datum
     * @return Token
     */
    public static function execute($datum): Token
    {
        $data = TokenData::validateAndCreate($datum);

        return Token::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                'account_id' => $data->account_id,
                'api_service_id' => $data->api_service_id,
                'value' => $data->value,
            ],
        );
    }
}
