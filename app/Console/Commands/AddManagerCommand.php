<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AddManagerCommand extends Command
{
    protected $signature = 'add-manager {name} {email} {password}';

    protected $description = 'Добавление нового менеджера';


    public function handle(): void
    {
        $checkIfManagerExists = User::query()
            ->where('email', $this->argument('email'))
            ->exists();

        if ($checkIfManagerExists) {
            $this->error('Менеджер с этой почтой уже существует');
            return;
        }

        User::create([
            'name' => $this->argument('name'),
            'email' => $email = $this->argument('email'),
            'password' => Hash::make($password = (string)$this->argument('password')),
            'email_verified_at' => now()
        ]);

        $this->info("Менеджер добавлен, Логин: $email, Пароль: $password");
    }
}
