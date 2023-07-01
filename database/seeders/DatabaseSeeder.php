<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        app()['cache']->forget('spatie.permission.cache');

        foreach([
            config('permission.table_names.model_has_permissions'),
            config('permission.table_names.model_has_roles'),
            config('permission.table_names.role_has_permissions'),
            config('permission.table_names.permissions'),
            config('permission.table_names.roles'),
            'users',
        ] as $table) {
            DB::table($table)->truncate();
        }

        $this->call([
            RoleTableSeeder::class,
            PermissionTableSeeder::class,
            PermissionRoleTableSeeder::class,
        ]);
    }
}
