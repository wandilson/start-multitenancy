<?php

namespace App\Http\Livewire\Acl\Roles;

use App\Models\Acl\Roles\Role;
use App\Rules\Tenant\TenantUnique;
use Livewire\Component;

class RoleEdit extends Component
{
    public $roles;
    public $name;
    public $label;


    public function mount($id)
    {
        $this->roles = Role::find($id);        
        $this->name = $this->roles['name'];
        $this->label = $this->roles['label'];
    }


    public function update()
    {
        $this->validate([
            'name' => [
                'required',
                'min:6',
                new TenantUnique('roles', $this->roles['id']),
            ],
            'label' => 'required|min:6',
        ],
        [
         'name.required'=> 'Informe o nome da Função',
         'name.unique'=> 'Esse nome de função já esta sendo usado',
         'label.required'=> 'Descrição da Função',
        ]);

        $this->roles->update([
            'name'  =>  $this->name,
            'label'  =>  $this->label
        ]);

        return redirect()->route('roles');
    }


    public function render()
    {
        return view('livewire.acl.roles.role-edit');
    }
}

