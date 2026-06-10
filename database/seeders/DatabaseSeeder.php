<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RolePermissionSeeder::class,
        ]);

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'test@exale.com',
        ]);

        $admin->assignRole('admin');

        //Create test Author
        $author = User::factory()->create([
            'name' => 'Author User',
            'email' => 'author@exale.com',
        ]);

        $author->assignRole('author');

    }
}
