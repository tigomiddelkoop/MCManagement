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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions('');
        $this->seedPermissions();
        $this->seedRoles();
    }

    public function seedPermissions()
    {
        $prefix = '[RoleSeeder][Permissions]';

        $this->command->info("$prefix Filling Table");

        $this->command->info("$prefix Creating Permissions");


        // Networkmanager Related Permissions
        Permission::create(['name' => 'networkmanager.access']);
        Permission::create(['name' => 'networkmanager.player.access']);
        Permission::create(['name' => 'networkmanager.player.viewip']);

        Permission::create(['name' => 'networkmanager.motd.access']);


        Permission::create(['name' => 'networkmanager.settings.access']);


        Permission::create(['name' => 'networkmanager.chat.access']);

        // Litebans Related Permissions
        Permission::create(['name' => 'litebans.access']);
        Permission::create(['name' => 'litebans.overview']);
        Permission::create(['name' => 'litebans.bans']);
        Permission::create(['name' => 'litebans.kicks']);
        Permission::create(['name' => 'litebans.mutes']);
        Permission::create(['name' => 'litebans.warnings']);

        // Luckperms Related Permissions
        Permission::create(['name' => 'luckperms.access']);

        // Nameless Related Permissions
        Permission::create(['name' => 'nameless.access']);

        // Panel Related Permissions
        Permission::create(['name' => 'mcmanagement.access']);
        Permission::create(['name' => 'mcmanagement.analytics']);
        Permission::create(['name' => 'mcmanagement.settings.access']);
        Permission::create(['name' => 'mcmanagement.settings.users']);
        Permission::create(['name' => 'mcmanagement.settings.language']);
        Permission::create(['name' => 'mcmanagement.settings.roles']);

        Permission::create(['name' => 'mcmanagement.changelog.access']);
    }

    public function seedRoles()
    {
        $prefix = '[RoleSeeder][Roles]';

//        $this->command->info("$prefix Truncating Table");
//        DB::dropForeign('role_has_permission')


        $this->command->info("$prefix Filling Table");

        $role = Role::create(['name' => "owner"]);
        $role->givePermissionTo(['networkmanager.access', 'networkmanager.player.access', 'networkmanager.player.viewip', 'networkmanager.settings.access', 'networkmanager.chat.access', 'litebans.access', 'litebans.overview', 'litebans.bans',
            'litebans.kicks', 'litebans.mutes', 'litebans.warnings', 'luckperms.access', 'nameless.access',
            'mcmanagement.access', 'mcmanagement.analytics', 'mcmanagement.access.settings', 'mcmanagement.access.settings.users', 'mcmanagement.access.settings.language', 'mcmanagement.access.settings.roles', 'networkmanager.motd.access']);

        $role = Role::create(['name' => "admin"]);
//        $role->givePermissionTo('networkmanager.player.viewip');

        $role = Role::create(['name' => "mod"]);
//        $role->givePermissionTo('');

        $this->command->info("$prefix Filling Table Done");
    }
}
