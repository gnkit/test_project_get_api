<?php

namespace App\Services\Shared;

abstract class BaseService
{
    /**
     * @var DataService $service
     */
    protected DataService $service;
    /**
     * @var string
     */
    protected string $path = '';

    /**
     * @param DataService $dataService
     */
    public function __construct(DataService $dataService)
    {
        $this->service = $dataService;
    }

    /**
     * @param string $username
     * @param string $dateFrom
     * @param string $dateTo
     * @param int $limit
     * @return int
     */
    public function store(string $username, string $dateFrom, string $dateTo, int $limit): int
    {
    }
}
