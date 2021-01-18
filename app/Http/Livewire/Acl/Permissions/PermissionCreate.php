<?php

namespace App\Http\Livewire\Acl\Permissions;

use App\Models\Acl\Modules\Module;
use App\Models\Acl\Permissions\Permission;
use Livewire\Component;

class PermissionCreate extends Component
{

    public $name;
    public $label;
    public $module;


    public function mount($id)
    {
        $this->module = Module::find($id);
    }


    public function store()
    {
        
        $this->validate([
            'name' => 'required|min:6|unique:permissions',
            'label' => 'required|min:6',
        ],
        [
         'name.required'=> 'Informe o nome da Permissão',
         'name.unique'=> 'Esse nome de permissão já esta sendo usado',
         'label.required'=> 'Descrição da Permissão',
        ]);

        
        Permission::create([
            'module_id' => $this->module['id'],   
            'name'  =>  $this->name,
            'label'  =>  $this->label
        ]);

        return redirect()->route('module.permissions', $this->module['id']);
    }

    public function render()
    {
        return view('livewire.acl.permissions.permission-create');
    }
}
