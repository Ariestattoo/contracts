<?php

namespace App\Models;

use App\Models\Traits\UsesTenantConnectionWithFallback;
use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    use UsesTenantConnectionWithFallback;
}
