<?php

namespace App\Console\Commands;

use App\Actions\ApiService\UpsertApiServiceAction;
use Illuminate\Console\Command;
use Throwable;
use function Laravel\Prompts\text;

class CreateApiService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-apiservice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new api service';

    /**
     * @return void
     */
    public function handle(): void
    {
        try {
            $datum['name'] = text(
                label: 'Please, enter a api service name',
                required: 'A api service name is required.'
            );

            $apiService = UpsertApiServiceAction::execute($datum);

            $this->info($apiService?->name . ' successfully created.' . PHP_EOL);

        } catch (Throwable $exception) {

            report($exception);
            $this->error('Requests failed. Try again later.');
        }
    }
}
