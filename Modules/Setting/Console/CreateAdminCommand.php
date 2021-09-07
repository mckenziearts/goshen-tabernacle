<?php

namespace Modules\Setting\Console;

use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setting:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user with admin role and all permissions.';

    public function handle()
    {
        $this->info('Create Admin User for your admin panel.');
        $this->createUser();
        $this->info('User created successfully.');
    }

    /**
     * Create admin user.
     *
     * @return void
     */
    protected function createUser(): void
    {
        $email = $this->ask('Email Address', 'admin@laravel-boilerplate.com');
        $name = $this->ask('Name', 'Admin Boilerplate');
        $password = $this->secret('Password');
        $confirmPassword = $this->secret('Confirm Password');

        // Passwords don't match
        if ($password !== $confirmPassword) {
            $this->info('Passwords don\'t match');
        }

        $this->info('Creating admin account...');

        $userData = [
            'email' => $email,
            'name' => $name,
            'password' => Hash::make($password),
            'last_login' => now()->toDateTimeString(),
            'email_verified_at' => now()->toDateTimeString(),
        ];
        $model = config('auth.providers.users.model');

        try {
            $user = tap((new $model)->forceFill($userData))->save();

            $user->assignRole(config('setting.users.admin_role'));
        } catch (\Exception | QueryException $e) {
            $this->error($e->getMessage());
        }
    }
}
