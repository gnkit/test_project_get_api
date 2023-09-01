<?php

namespace App\DataTransferObjects\ApiService;

use Spatie\LaravelData\Data;

final class ApiServiceData extends Data
{
    /**
     * @param int|null $id
     * @param string $name
     * @param int $token_type_id
     */
    public function __construct(
        public readonly ?int   $id,
        public readonly string $name,
        public readonly int    $token_type_id,
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
            'token_type_id' => ['required', 'integer', 'exists:token_types,id'],
        ];
    }
}
