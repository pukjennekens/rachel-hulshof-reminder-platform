<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-account';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Maak een account aan voor een gebruiker';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name     = $this->ask('Wat is de naam van de gebruiker?');
        $email    = $this->ask('Wat is het e-mailadres van de gebruiker?');
        $password = $this->secret('Wat is het wachtwoord van de gebruiker?');

        User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => bcrypt($password),
        ]);

        $this->info('Account is aangemaakt!');
    }
}
