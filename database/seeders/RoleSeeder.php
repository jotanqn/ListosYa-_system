<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $staff = Role::create(['name' => 'staff']);
        $general = Role::create(['name' => 'general']);
        $publico = Role::create(['name' => 'publico']);

        Permission::create(['name' => 'show programs'])->syncRoles([$admin,$staff,$general,$publico]);
        Permission::create(['name' => 'edit programs'])->syncRoles([$admin,$staff]);
        Permission::create(['name' => 'create programs'])->syncRoles([$admin,$staff]);
        Permission::create(['name' => 'delete programs'])->syncRoles([$admin]);


        Permission::create(['name' => 'show users'])->syncRoles([$admin,$staff]);
        Permission::create(['name' => 'edit users'])->syncRoles([$admin]);
        Permission::create(['name' => 'create users'])->syncRoles([$admin,$general,$publico]);
        Permission::create(['name' => 'delete users'])->syncRoles([$admin,$general]);

        Permission::create(['name' => 'show blacklist'])->syncRoles([$admin,$staff]);
        Permission::create(['name' => 'edit blacklist'])->syncRoles([$admin]);
        Permission::create(['name' => 'create blacklist'])->syncRoles([$admin,$staff]);
        Permission::create(['name' => 'delete blacklist'])->syncRoles([$admin,$staff]);

    }
}
