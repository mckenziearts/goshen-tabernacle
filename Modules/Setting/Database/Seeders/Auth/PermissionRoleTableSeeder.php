<?php

namespace Modules\Setting\Database\Seeders\Auth;

use Illuminate\Database\Seeder;
use Modules\Setting\Entities\Permission;
use Modules\Setting\Entities\Role;
use Modules\Setting\Traits\Database\DisableForeignKeys;

class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        $administrator = Role::query()->where('name', config('setting.users.admin_role'))->firstOrFail();

        $permissions = Permission::all();

        $administrator->permissions()->sync($permissions->pluck('id')->all());

        $this->enableForeignKeys();
    }
}
