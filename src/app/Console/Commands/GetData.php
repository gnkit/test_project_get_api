<?php

namespace App\Console\Commands;

use App\Services\Shared\DataService;
use Illuminate\Console\Command;
use Throwable;

class GetData extends Command
{
    /**
     * @var string
     */
    protected $signature = 'get {username} {entity} {date=null}';

    /**
     * @var string
     */
    protected $description = 'Get all data of account from db';

    /**
     * @param DataService $service
     * @return void
     */
    public function handle(DataService $service): void
    {
        try {
            $username = $this->argument('username');
            $entity = $this->argument('entity');
            $date = $this->argument('date');

            $action = $service->getAction($entity);

            $data = $action::execute($username, $date);

            foreach ($data as $datum) {
                $this->info($datum . PHP_EOL);
            }

            $this->info('The command was successful!' . PHP_EOL . count($data));

        } catch (Throwable $exception) {

            report($exception);
            $this->error('Requests failed. Try again later');
        }
    }
}
