<?php

namespace App\Models\Acl\Permissions;

use App\Models\Acl\Modules\Module;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id', 'name', 'label',
    ];


    public function module(){
        return $this->belongsTo(Module::class);
    }
}
