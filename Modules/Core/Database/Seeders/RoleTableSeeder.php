<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Entities\Role;
use Modules\Core\Traits\DisableForeignKeys;

class RoleTableSeeder extends Seeder
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

        Role::create([
            'name' => config('starterkit.core.config.users.admin_role'),
            'display_name' => __('Administrator'),
            'description' => __('Site administrator with access to shop admin panel and developer tools.'),
            'can_be_removed' => false,
        ]);

        Role::create([
            'name' => 'manager',
            'display_name' => __('Manager'),
            'description' => __('Site manager with access to shop admin panel and publishing menus.'),
            'can_be_removed' => false,
        ]);

        Role::create([
            'name' => config('starterkit.core.config.users.default_role'),
            'display_name' => __('User'),
            'description' => __('Site customer role with access on front site.'),
            'can_be_removed' => false,
        ]);

        $this->enableForeignKeys();
    }
}
