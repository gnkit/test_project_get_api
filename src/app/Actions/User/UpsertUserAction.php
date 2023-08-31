<?php

namespace App\Actions\User;

use App\DataTransferObjects\User\UserData;
use App\Models\User;

final class UpsertUserAction
{
    /**
     * @param array $datum
     * @return User
     */
    public static function execute(array $datum): User
    {
        $data = UserData::validateAndCreate($datum);

        return User::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password,
                'email_verified_at' => $data->email_verified_at ?? null,
                'remember_token' => $data->remember_token ?? null,
            ],
        );
    }
}
