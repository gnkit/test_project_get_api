<?php

namespace App\DataTransferObjects\Company;

use Spatie\LaravelData\Data;

final class CompanyData extends Data
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

    /**
     * @return array[]
     */
    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }
}
