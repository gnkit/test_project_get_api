<?php

namespace App\Services\Order;

use App\Actions\Order\CreateOrderAction;
use App\Services\Shared\DataService;

class OrderService
{
    /**
     * @var DataService $service
     */
    private DataService $service;

    public function __construct(DataService $dataService)
    {
        $this->service = $dataService;
    }

    /**
     * @param string $dateFrom
     * @param string $dateTo
     * @param string $key
     * @param int $limit
     * @return int
     */
    public function store(string $dateFrom, string $dateTo, string $key, int $limit): int
    {
        $apiData = $this->service->getApiData($dateFrom, $dateTo, $key, $limit);

        $chunkData = $this->service->splitToChunk($limit, $apiData);

        foreach ($chunkData as $chunk) {
            foreach ($chunk as $datum) {
                CreateOrderAction::execute($datum);
            }
        }

        return count($apiData);
    }

}
