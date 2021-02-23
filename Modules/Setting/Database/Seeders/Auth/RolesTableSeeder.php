<?php

namespace Modules\Setting\Database\Seeders\Auth;

use Illuminate\Database\Seeder;
use Modules\Setting\Entities\Role;
use Modules\Setting\Traits\Database\DisableForeignKeys;

class RolesTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        Role::create([
            'name' => config('setting.users.admin_role'),
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
            'name' => config('setting.users.default_role'),
            'display_name' => __('Member'),
            'description' => __('Site customer role with access on front site.'),
            'can_be_removed' => false,
        ]);

        $this->enableForeignKeys();
    }
}
