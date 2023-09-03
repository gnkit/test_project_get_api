<?php

namespace Database\Seeders;

use App\Models\TokenType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TokenTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'bearer', 'api_service_id' => fake()->numberBetween(1, 2)],
            ['name' => 'api', 'api_service_id' => fake()->numberBetween(1, 2)],
        ];

        foreach ($data as $datum) {
            TokenType::create($datum);
        }
    }
}
