<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            ]
        ];
        
        foreach ($users as $user) {
            $create = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make(12345678),
            ]);
            
            $create->assignRole($user['role']);
        }
    }
}