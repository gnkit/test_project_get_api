<?php

namespace App\Actions\Token;

use App\Models\Token;

final class ExistsTokenTypeAction
{
    /**
     * @param $data
     * @param $token_type_id
     * @return bool
     */
    public static function execute($data, $token_type_id): bool
    {
        return Token::where([
            ['account_id', '=', $data['account_id']],
            ['api_service_id', '=', $data['api_service_id']],
            ['token_type_id', '=', $token_type_id]
        ])->exists();
    }
}
