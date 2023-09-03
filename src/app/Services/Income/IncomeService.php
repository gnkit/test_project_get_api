<?php

namespace App\Services\Income;

use App\Actions\Income\UpsertIncomeAction;
use App\Services\Shared\BaseService;

final class IncomeService extends BaseService
{
    /**
     * @var string
     */
    protected string $path = 'api/incomes';

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
                UpsertIncomeAction::execute($datum, $username);
            }
        }

        return count($apiData);
    }
}
