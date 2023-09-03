<?php

namespace Database\Seeders;

use App\Models\Token;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'account_id' => fake()->numberBetween(1, 1),
                'api_service_id' => fake()->numberBetween(1, 1),
                'token_type_id' => fake()->numberBetween(1, 1),
                'value' => Str::random(64)
            ],
            [
                'account_id' => fake()->numberBetween(1, 1),
                'api_service_id' => fake()->numberBetween(2, 2),
                'token_type_id' => fake()->numberBetween(2, 2),
                'value' => Str::random(64)
            ],
        ];

        foreach ($data as $datum) {
            Token::create($datum);
        }
    }
}
