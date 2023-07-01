<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

final class PermissionRoleTableSeeder extends Seeder
{
    public function run(): void
    {
        $administrator = Role::query()
            ->where('name', config('goshen.users.admin_role'))
            ->firstOrFail();

        $permissions = Permission::all();

        $administrator->permissions()->sync($permissions->pluck('id')->all());
    }
}
