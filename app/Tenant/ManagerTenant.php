<?php

namespace App\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ManagerTenant extends Controller
{
    public function getTenantIdentify()
    {
        
        return Auth::user()->tenant->id;
      
    }
}