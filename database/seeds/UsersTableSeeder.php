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
                'role' => 'Super Admin'
            ],
            1 => [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'role' => 'Admin'
            ],
            2 => [
                'name' => 'User',
                'email' => 'user@mail.com',
                'role' => 'User'
            ]
        ];
        
        foreach ($users as $user) {
            $create = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make(12345678),
                'email_verified_at' => Carbon::now()->toDateTimeString()
            ]);
            
            $create->assignRole($user['role']);
        }
    }
}