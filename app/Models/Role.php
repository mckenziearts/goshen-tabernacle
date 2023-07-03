<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * @mixin IdeHelperRole
 */
final class Role extends SpatieRole
{
    use HasFactory;

    public function isAdmin(): bool
    {
        return $this->name === config('goshen.users.admin_role');
    }
}
