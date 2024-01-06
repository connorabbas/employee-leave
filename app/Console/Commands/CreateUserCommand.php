<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateUserCommand extends Command
{
    protected $signature = 'user:create';
    protected $description = 'Create a new user with roles';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = $this->ask('Enter the full name of the user');
        $email = $this->ask('Enter the email of the user');
        $password = $this->secret('Enter the password');
        $confirmPassword = $this->secret('Confirm the password');

        // Validation logic
        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $confirmPassword,
        ], [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return;
        }

        $roles = Role::pluck('name');
        $chosenRoles = $this->choice('Which roles should this user have?', $roles->toArray(), null, null, true);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        $user->assignRole($chosenRoles);

        $this->info('User successfully created!');
    }
}
