<?php

namespace App\DataTransferObjects\TokenType;

use Spatie\LaravelData\Data;

final class TokenTypeData extends Data
{
    /**
     * @param int|null $id
     * @param string $name
     */
    public function __construct(
        public readonly ?int   $id,
        public readonly string $name,
    )
    {
    }
}
