<?php

namespace App\Services\Order;

use App\Actions\Order\UpsertOrderAction;
use App\Services\Shared\BaseService;

final class OrderService extends BaseService
{
    /**
     * @var string
     */
    protected string $path = 'api/orders';

    /**
     * @param string $username
     * @param string $dateFrom
     * @param string $dateTo
     * @param int $limit
     * @return int
     */
    public function store(string $username, string $dateFrom, string $dateTo, int $limit): int
    {
        $apiData = $this->service->getApiData($this->path, $dateFrom, $dateTo, $limit);

        $chunkData = $this->service->splitToChunk($limit, $apiData);

        foreach ($chunkData as $chunk) {
            foreach ($chunk as $datum) {
                UpsertOrderAction::execute($datum, $username);
            }
        }

        return count($apiData);
    }
}
