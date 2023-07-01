<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

final class Role extends SpatieRole
{
    use HasFactory;

    public function isAdmin(): bool
    {
        return $this->name === config('goshen.users.admin_role');
    }
}
