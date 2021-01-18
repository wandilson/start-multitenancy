<?php

namespace App\Http\Livewire\Acl\Permissions;

use App\Models\Acl\Modules\Module;
use App\Models\Acl\Permissions\Permission;
use Livewire\Component;
use Livewire\WithPagination;

class PermissionList extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''], 
        'totalPages' => ['except' => '5']
    ];

    public $search = '';
    public $totalPages = '5';
    public $module;


    public function mount($id)
    {
        $this->module = Module::find($id);
    }

    public function render()
    {
        $permissions = Permission::latest()->where('name', 'LIKE', "%{$this->search}%")->where('module_id', $this->module['id'])
                        ->paginate($this->totalPages);
        
        return view('livewire.acl.permissions.permission-list', [
            'permissions'     => $permissions
        ]);
    }


    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->totalPages = '5';
    }


    public function destroy($id)
    {
        $item = Permission::find($id);
        $item->delete();
    }
}