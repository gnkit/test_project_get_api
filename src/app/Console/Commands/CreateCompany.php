<?php

namespace App\Console\Commands;

use App\Actions\Company\UpsertCompanyAction;
use Illuminate\Console\Command;
use Throwable;
use function Laravel\Prompts\text;

class CreateCompany extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new company';

    /**
     * @return void
     */
    public function handle(): void
    {
        try {
            $datum['name'] = text(
                label: 'Please, enter a company name',
                required: 'A company name is required.'
            );

            $company = UpsertCompanyAction::execute($datum);

            $this->info($company?->name . ' successfully created.' . PHP_EOL);

        } catch (Throwable $exception) {

            report($exception);
            $this->error('Requests failed. Try again later.');
        }
    }
}
