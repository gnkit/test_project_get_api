<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'manager',
            'email' => 'manager@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Manager!1'),
            'remember_token' => Str::random(10),
        ]);

        Account::create([
            'username' => $user->name,
            'office_id' => fake()->numberBetween(1, 2),
            'user_id' => $user->id,
        ]);

    }
}
