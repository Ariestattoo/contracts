<?php

namespace App\Models;

use App\Models\Traits\UsesTenantConnectionWithFallback;
use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    use UsesTenantConnectionWithFallback;
}