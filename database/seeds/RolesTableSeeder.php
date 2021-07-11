<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            0 => [
                'name' => 'Super Admin',
                'permission' => []
            ],
        ];
        
        foreach ($roles as $role) {
            $create = Role::create([
                'name' => $role['name']
            ]);
            
            $create->syncPermissions($role['permission']);
        }
    }
}