<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(RolesAndpermissionsSeeder::class);
        $testUser = User::factory()->create([
            'username' => 'user',
            'emp_id' => '1',
            'email' => 'test@example.com',
        ]);
        $testUser->assignRole('user');

        $adminUser = User::factory()->create([
            'username' => 'Admin User',
            'emp_id' => '2',
            'email' => 'admin@example.com',
        ]);
        $adminUser->assignRole('admin');

        $hrAdminUser = User::factory()->create([
            'username' => 'HR Admin',
            'emp_id' => '3',
            'email' => 'hr_admin@example.com',
        ]);
        $hrAdminUser->assignRole('hr_admin');
    }
}
