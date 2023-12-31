<?php

namespace App\DataTransferObjects\ApiService;

use Spatie\LaravelData\Data;

final class ApiServiceData extends Data
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
