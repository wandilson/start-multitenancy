<?php

namespace App\Http\Livewire\Acl\Roles;

use App\Models\Acl\Roles\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleList extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''], 
        'totalPages' => ['except' => '5']
    ];

    public $search = '';
    public $totalPages = '5';


    public function render()
    {
        $roles = Role::latest()->where('name', 'LIKE', "%{$this->search}%")
                        ->paginate($this->totalPages);
        
        return view('livewire.acl.roles.role-list', [
            'roles'     => $roles
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
        $item = Role::find($id);
        $item->delete();
    }
}