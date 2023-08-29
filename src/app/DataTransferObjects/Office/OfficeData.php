<?php

namespace App\DataTransferObjects\Office;

use Spatie\LaravelData\Data;

final class OfficeData extends Data
{
    /**
     * @param int|null $id
     * @param string $name
     * @param int $company_id
     */
    public function __construct(
        public readonly ?int   $id,
        public readonly string $name,
        public readonly int    $company_id,
    )
    {
    }
}
