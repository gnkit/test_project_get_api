<?php

namespace App\Console\Commands;

use App\Actions\Account\GetIdUsernameAccountAction;
use App\Actions\ApiService\GetIdNameApiServiceAction;
use App\Actions\Token\UpsertTokenAction;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Throwable;
use function Laravel\Prompts\select;

class CreateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new token';

    /**
     * @return void
     */
    public function handle(): void
    {
        try {
            $datum['account_id'] = select(
                label: 'Select account',
                options: GetIdUsernameAccountAction::execute('username', 'id'),
                scroll: 10
            );

            $datum['api_service_id'] = select(
                label: 'Select api service',
                options: GetIdNameApiServiceAction::execute('name', 'id'),
                scroll: 10
            );

            $datum['value'] = Str::random(64);

            $token = UpsertTokenAction::execute($datum);

            $this->info($token?->value . ' successfully created.' . PHP_EOL);

        } catch (Throwable $exception) {

            report($exception);
            $this->error('Requests failed. Try again later.');
        }
    }
}
