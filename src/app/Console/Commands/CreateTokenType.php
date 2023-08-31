<?php

namespace App\Console\Commands;

use App\Actions\TokenType\UpsertTokenTypeAction;
use Illuminate\Console\Command;
use Throwable;
use function Laravel\Prompts\text;

class CreateTokenType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-tokentype';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new type of token';

    /**
     * @return void
     */
    public function handle(): void
    {
        try {
            $datum['name'] = text(
                label: 'Please, enter a type of token',
                required: 'A type of token is required.'
            );

            $tokenType = UpsertTokenTypeAction::execute($datum);

            $this->info($tokenType?->name . ' successfully created.' . PHP_EOL);

        } catch (Throwable $exception) {

            report($exception);
            $this->error('Requests failed. Try again later.');
        }
    }
}
