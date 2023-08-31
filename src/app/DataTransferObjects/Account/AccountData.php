<?php

namespace App\DataTransferObjects\Account;

use Spatie\LaravelData\Data;

final class AccountData extends Data
{
    /**
     * @param int|null $id
     * @param string $username
     * @param int $office_id
     * @param int $user_id
     */
    public function __construct(
        public readonly ?int   $id,
        public readonly string $username,
        public readonly int    $office_id,
        public readonly int    $user_id,
    )
    {
    }

    /**
     * @return array[]
     */
    public static function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255'],
            'office_id' => ['required', 'integer', 'exists:offices,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
