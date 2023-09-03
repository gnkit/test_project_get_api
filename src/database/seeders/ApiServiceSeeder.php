<?php

namespace Database\Seeders;

use App\Models\ApiService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApiServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'ozon'],
            ['name' => 'wb'],
            ['name' => 'satu'],
        ];

        foreach ($data as $datum) {
            ApiService::create($datum);
        }
    }
}
