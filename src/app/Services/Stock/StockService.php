<?php

namespace App\Services\Stock;

use App\Actions\Stock\CreateStockAction;
use App\Services\Shared\BaseService;

final class StockService extends BaseService
{
    /**
     * @var string
     */
    protected string $path = 'api/stocks';

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
                CreateStockAction::execute($datum);
            }
        }

        return count($apiData);
    }
}
