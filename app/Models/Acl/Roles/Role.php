<?php

namespace App\Models\Acl\Roles;

use App\Tenant\Traits\TenantTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    use TenantTraits;

    protected $fillable = [
        'name',
        'tenant_id',
        'label',
    ];
}
