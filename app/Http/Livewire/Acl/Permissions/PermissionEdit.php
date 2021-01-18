<?php

namespace App\Http\Livewire\Acl\Permissions;

use App\Models\Acl\Permissions\Permission;
use Livewire\Component;

class PermissionEdit extends Component
{
    public $permission;
    public $name, $label;

    public function mount($id)
    {
        $this->permission = Permission::find($id);
        $this->name = $this->permission['name'];
        $this->label = $this->permission['label'];
    }


    public function update()
    {
        $this->validate([
            'label' => 'required|min:6',
            'name' => 'required|min:6|unique:permissions,name,'.$this->permission['id']
        ],
        [
         'name.required'=> 'Informe o nome da Permissão',
         'name.unique'=> 'Esse nome de permissão já esta sendo usado',
         'label.required'=> 'Descrição da Permissão',
        ]);

        $this->permission->update([
            'name'  =>  $this->name,
            'label'  =>  $this->label
        ]);

        return redirect()->route('module.permissions', $this->permission['module_id']);
    }


    public function render()
    {
        return view('livewire.acl.permissions.permission-edit');
    }
}
