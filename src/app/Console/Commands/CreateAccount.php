<?php

namespace App\Console\Commands;

use App\Actions\Account\UpsertAccountAction;
use App\Actions\Office\GetIdNameOfficeAction;
use App\Actions\User\GetIdNameUserAction;
use Illuminate\Console\Command;
use Throwable;
use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

class CreateAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-account';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new account';

    /**
     * @return void
     */
    public function handle(): void
    {
        try {
            $datum['username'] = text(
                label: 'Please, enter a username',
                required: 'A username is required.'
            );

            $datum['office_id'] = select(
                label: 'Select office',
                options: GetIdNameOfficeAction::execute('name', 'id'),
                scroll: 10
            );

            $datum['user_id'] = select(
                label: 'Select user',
                options: GetIdNameUserAction::execute('name', 'id'),
                scroll: 10
            );

            $account = UpsertAccountAction::execute($datum);

            $this->info($account?->username . ' successfully created.' . PHP_EOL);

        } catch (Throwable $exception) {

            report($exception);
            $this->error('Requests failed. Try again later.');
        }
    }
}
