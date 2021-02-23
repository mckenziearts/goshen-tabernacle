<?php

namespace Modules\Setting\Entities;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    /**
     * Determine if a User is an admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->name === config('setting.users.admin_role');
    }
}
