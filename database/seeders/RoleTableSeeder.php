<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

final class RoleTableSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => config('goshen.users.admin_role'),
            'display_name' => __('Administrateur'),
            'description' => __('Site administrator with access to shop admin panel and developer tools.'),
            'can_be_removed' => false,
        ]);

        Role::create([
            'name' => 'manager',
            'display_name' => __('Gestionnaire'),
            'description' => __('Site manager with access to shop admin panel and publishing menus.'),
            'can_be_removed' => false,
        ]);

        Role::create([
            'name' => config('goshen.users.default_role'),
            'display_name' => __('Utilisateur'),
            'description' => __('Site customer role with access on front site.'),
            'can_be_removed' => false,
        ]);
    }
}
