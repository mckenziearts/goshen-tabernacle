<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Entities\Permission;
use Modules\Core\Entities\Role;
use Modules\Core\Traits\DisableForeignKeys;

class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $administrator = Role::query()->where('name', config('core.users.admin_role'))->firstOrFail();
        $permissions = Permission::all();
        $administrator->permissions()->sync($permissions->pluck('id')->all());

        $this->enableForeignKeys();
    }
}
