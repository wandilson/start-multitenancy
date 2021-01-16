<?php

namespace App\Tenant\Traits;

use App\Observers\Tenant\ObserverTenant;
use App\Scopes\Tenant\TenantScope;

trait TenantTraits
{
    protected static function booted()
    {   
        if(auth()->check()) {
            static::addGlobalScope(new TenantScope);
            static::observe(new ObserverTenant);
        }        
    }
}