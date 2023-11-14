<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        $permissions2 = Permission::create(['name' => 'Student_C']);
        $permissions3 = Permission::create(['name' => 'Student_U']);
        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Manager']);
        $role3 = Role::create(['name' => 'Student']);
        $role3 = Role::create(['name' => 'Contributor']);
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ]);
        $user->assignRole($role1);
    }
}
