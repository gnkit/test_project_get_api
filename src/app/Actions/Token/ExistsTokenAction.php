<?php

namespace App\Actions\Token;

use App\Models\Token;

final class ExistsTokenAction
{
    /**
     * @param $value
     * @return bool
     */
    public static function execute($value): bool
    {
        return Token::where('value', '=', $value)->exists();
    }
}
