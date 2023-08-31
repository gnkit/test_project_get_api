<?php

namespace App\Console\Commands;

use App\Actions\User\UpsertUserAction;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Throwable;
use function Laravel\Prompts\text;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * @return void
     */
    public function handle(): void
    {
        try {
            $datum['name'] = text(
                label: 'Please, enter a name',
                required: 'A name is required.'
            );

            $datum['email'] = text(
                label: 'Please, enter a email',
                required: 'A email is required.',
                validate: fn(string $value) => User::where('email', '=', $value)->first()
                    ? 'An email already exists.'
                    : null
            );

            $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
            $datum['password'] = text(
                label: 'Please, enter a password',
                placeholder: 'Minimum 8 characters, one uppercase and one lowercase letter, one symbol, one digit ...',
                required: 'A password is required.',
                validate: fn(string $value) => (0 === preg_match($password_regex, $value))
                    ? 'The password must be at least minimum 8 characters, one uppercase and one lowercase letter, one symbol, one digit.'
                    : null
            );

            $datum['remember_token'] = Str::random(10);

            $user = UpsertUserAction::execute($datum);

            $this->info($user?->name . ' successfully created.' . PHP_EOL);

        } catch (Throwable $exception) {

            report($exception);
            $this->error('Requests failed. Try again later.');
        }
    }
}
