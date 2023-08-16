<?php

namespace App\Services\Shared;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

final class DataService
{
    /**
     * @param string $path
     * @param string $dateFrom
     * @param string $dateTo
     * @param int $limit
     * @return array
     */
    public function getApiData(string $path, string $dateFrom, string $dateTo, int $limit): array
    {
        $host = config('services.laravel_api.scheme') . config('services.laravel_api.host');
        $key = config('services.laravel_api.key');
        $linkNext = '';
        $page = 1;
        $apiData = [];
        while (null !== $linkNext) {
            $url = "$host/$path?dateFrom=$dateFrom&dateTo=$dateTo&page=$page&key=$key&limit=$limit";
            $response = Http::get($url);
            $data = json_decode($response->body());
            sleep(1);
            $linkNext = $data->links->next;
            foreach ($data->data as $datum) {
                $apiData[] = $datum;
            }
            $page++;
        }
        return $apiData;
    }

    /**
     * @param int $quantity
     * @param array $data
     * @return Collection
     */
    public function splitToChunk(int $quantity, array $data): Collection
    {
        $collection = collect($data);

        if ($quantity > $collection->count()) {

            return $collection->chunk($quantity);
        }

        return $collection->chunk($quantity);
    }
}
