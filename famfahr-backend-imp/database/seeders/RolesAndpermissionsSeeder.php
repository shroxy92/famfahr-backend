<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndpermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //clear cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::firstOrCreate(['name' => 'add_user']);
        Permission::firstOrCreate(['name' => 'user_edit']);
        Permission::firstOrCreate(['name' => 'user_manage']);
        Permission::firstOrCreate(['name' => 'user_permission']);
        Permission::firstOrCreate(['name' => 'add_employee']);
        Permission::firstOrCreate(['name' => 'add_dept_lead']);

        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);
        $hrAdmin = Role::create(['name' => 'hr_admin']);

        $admin->givePermissionTo(Permission::all());
        $hrAdmin->givePermissionTo('user_permission');
        $user->givePermissionTo('add_user','user_edit','user_manage','add_employee','add_dept_lead');
    }
}
