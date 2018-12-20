<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

//use Spatie\Permission\Contracts\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('permissions')->insert([
//            'name' => str_random(10),
//            'email' => str_random(10).'@gmail.com',
//            'password' => bcrypt('secret'),
//        ]);
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $this->seedPermissions();
        $this->seedRoles();
    }

    public function seedPermissions()
    {
        $prefix = '[RoleSeeder][Permissions]';

        $this->command->info("$prefix Filling Table");

        $this->command->info("$prefix Creating Permissions");

        Permission::create(['name' => 'networkmanager.view.playerip']);
        Permission::create(['name' => 'panel.view.settings']);
    }

    public function seedRoles()
    {
        $prefix = '[RoleSeeder][Roles]';

//        $this->command->info("$prefix Truncating Table");
//        DB::statement('TRUNCATE roles');


        $this->command->info("$prefix Filling Table");

        $role = Role::create(['name' => "owner"]);
        $role->givePermissionTo('networkmanager.view.playerip', 'panel.view.settings');

        $role = Role::create(['name' => "admin"]);

        $role = Role::create(['name' => "mod"]);

//        $role = Role::create(['name' => "owner"]);
        $this->command->info("$prefix Filling Table Done");
    }
}
