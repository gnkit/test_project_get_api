<?php

namespace App\Actions\TokenType;

use App\DataTransferObjects\TokenType\TokenTypeData;
use App\Models\TokenType;

final class UpsertTokenTypeAction
{
    /**
     * @param $datum
     * @return TokenType
     */
    public static function execute($datum): TokenType
    {
        $data = TokenTypeData::validateAndCreate($datum);

        return TokenType::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                'name' => $data->name,
            ],
        );
    }
}
