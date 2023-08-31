<?php

namespace App\DataTransferObjects\User;

use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Spatie\LaravelData\Data;

final class UserData extends Data
{
    /**
     * @param int|null $id
     * @param string|null $name
     * @param string $email
     * @param string $password
     * @param Carbon|null $email_verified_at
     * @param string $remember_token
     */
    public function __construct(
        public readonly ?int    $id,
        public readonly ?string $name,
        public readonly string  $email,
        public readonly string  $password,
        public readonly ?Carbon $email_verified_at,
        public readonly string  $remember_token,
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
            'email' => ['required', 'email', 'email:rfc,dns', Rule::unique('users', 'email')->ignore(request()->user)],
            'password' => ['sometimes', Password::min(8)->mixedCase()->numbers()->symbols()],
            'email_verified_at' => ['nullable', 'date'],
            'remember_token' => ['required', 'string', 'max:512'],
        ];
    }
}
