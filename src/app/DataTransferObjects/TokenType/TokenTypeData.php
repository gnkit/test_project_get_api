<?php

namespace App\DataTransferObjects\TokenType;

use Spatie\LaravelData\Data;

final class TokenTypeData extends Data
{
    /**
     * @param int|null $id
     * @param string $name
     * @param int $api_service_id
     */
    public function __construct(
        public readonly ?int   $id,
        public readonly string $name,
        public readonly int    $api_service_id,
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
            'api_service_id' => ['required', 'integer', 'exists:api_services,id'],
        ];
    }
}
