<?php

namespace App\Services\Sale;

use App\Actions\Sale\CreateSaleAction;
use App\Services\Shared\DataService;

final class SaleService
{
    /**
     * @var DataService $service
     */
    private DataService $service;
    /**
     * @var string
     */
    private string $path = 'api/sales';

    /**
     * @param DataService $dataService
     */
    public function __construct(DataService $dataService)
    {
        $this->service = $dataService;
    }

    /**
     * @param string $dateFrom
     * @param string $dateTo
     * @param int $limit
     * @return int
     */
    public function store(string $dateFrom, string $dateTo, int $limit): int
    {
        $apiData = $this->service->getApiData($this->path, $dateFrom, $dateTo, $limit);

        $chunkData = $this->service->splitToChunk($limit, $apiData);

        foreach ($chunkData as $chunk) {
            foreach ($chunk as $datum) {
                CreateSaleAction::execute($datum);
            }
        }

        return count($apiData);
    }
}
