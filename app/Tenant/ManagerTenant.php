<?php

namespace App\Tenant;

use App\Http\Controllers\Controller;

class ManagerTenant extends Controller
{
    public function getTenantIdentify()
    {
        return Auth()->user()->tenant_id;
    }
}