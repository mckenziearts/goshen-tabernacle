<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Setting\Database\Seeders\Auth\PermissionRoleTableSeeder;
use Modules\Setting\Database\Seeders\Auth\PermissionsTableSeeder;
use Modules\Setting\Database\Seeders\Auth\RolesTableSeeder;
use Modules\Setting\Traits\Database\DisableForeignKeys;
use Modules\Setting\Traits\Database\TruncateTable;

class SettingDatabaseSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $this->truncateMultiple([
            config('permission.table_names.model_has_permissions'),
            config('permission.table_names.model_has_roles'),
            config('permission.table_names.role_has_permissions'),
            config('permission.table_names.permissions'),
            config('permission.table_names.roles'),
            'users',
        ]);

        $this->call([
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
        ]);

        $this->enableForeignKeys();
    }
}
