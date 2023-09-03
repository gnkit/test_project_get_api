<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'managers', 'company_id' => fake()->numberBetween(1, 2)],
            ['name' => 'customers', 'company_id' => fake()->numberBetween(1, 2)],
            ['name' => 'admins', 'company_id' => fake()->numberBetween(1, 2)],
        ];

        foreach ($data as $datum) {
            Office::create($datum);
        }
    }
}
