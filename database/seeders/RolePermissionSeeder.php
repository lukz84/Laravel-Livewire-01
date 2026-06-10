<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //Create Permissions
        $permissions = [
            'create posts',
            'edit own posts',
            'edit all postsphp ',
            'delete own posts',
            'delete all posts',
            'publish posts',
            'manage users',
            'manage roles',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        //Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);
        $authorRole = Role::firstOrCreate(['name' => 'author']);

        //Assign Permissions to Roles
        $adminRole->givePermissionTo($permissions);
        $editorRole->givePermissionTo(['create posts', 'edit all posts', 'delete all posts', 'publish posts']);
        $authorRole->givePermissionTo(['create posts', 'edit own posts', 'delete own posts']);

        //Create Subscriber Role
        $subscriberRole = Role::firstOrCreate(['name' => 'subscriber']);
        

    }
}
