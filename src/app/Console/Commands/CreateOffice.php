<?php

namespace App\Console\Commands;

use App\Actions\Company\GetIdNameCompanyAction;
use App\Actions\Office\UpsertOfficeAction;
use Illuminate\Console\Command;
use Throwable;
use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

class CreateOffice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-office';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new office';

    /**
     * @return void
     */
    public function handle(): void
    {
        try {
            $datum['name'] = text(
                label: 'Please, enter a office name',
                required: 'A office name is required.'
            );

            $datum['company_id'] = select(
                label: 'Select company',
                options: GetIdNameCompanyAction::execute('name', 'id'),
                scroll: 10
            );

            $office = UpsertOfficeAction::execute($datum);

            $this->info($office?->name . ' successfully created.' . PHP_EOL);

        } catch (Throwable $exception) {

            report($exception);
            $this->error('Requests failed. Try again later.');
        }
    }
}
