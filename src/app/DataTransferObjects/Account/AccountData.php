<?php

namespace App\DataTransferObjects\AccountData;

use Spatie\LaravelData\Data;

final class AccountData extends Data
{
    /**
     * @param int|null $id
     * @param int $office_id
     */
    public function __construct(
        public readonly ?int $id,
        public readonly int  $office_id,
    )
    {
    }
}
