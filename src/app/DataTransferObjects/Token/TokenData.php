<?php

namespace App\DataTransferObjects\Token;

use Spatie\LaravelData\Data;

final class TokenData extends Data
{
    /**
     * @param int|null $id
     * @param int $account_id
     * @param int $api_service_id
     * @param string $value
     */
    public function __construct(
        public readonly ?int   $id,
        public readonly int    $account_id,
        public readonly int    $api_service_id,
        public readonly string $value,
    )
    {
    }
}
