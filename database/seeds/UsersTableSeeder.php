<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            0 => [
                'name' => 'Super Admin',
                'email' => 'admin.super@mail.com',
                'role' => 'Super Admin',
                'no_registration' => NULL
            ],
            1 => [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'role' => 'Admin',
                'no_registration' => NULL
            ],
            2 => [
                'name' => 'User',
                'email' => 'user@mail.com',
                'role' => 'User',
                'no_registration' => '02122001'
            ]
        ];
        
        foreach ($users as $user) {
            $create = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make(12345678),
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'no_registration' => $user['no_registration'],
            ]);
            
            $create->assignRole($user['role']);
        }
    }
}