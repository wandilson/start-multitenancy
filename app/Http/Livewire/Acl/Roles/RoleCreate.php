<?php

namespace App\Http\Livewire\Acl\Roles;

use App\Models\Acl\Roles\Role;
use App\Rules\Tenant\TenantUnique;
use Livewire\Component;

class RoleCreate extends Component
{

    public $name;
    public $label;

    public function store()
    {
        $this->validate([
            'name' => [
                'required',
                'min:6',
                new TenantUnique('roles'),
            ],
            'label' => 'required|min:6',
        ],
        [
         'name.required'=> 'Informe o nome da Função',
         'name.unique'=> 'Esse nome de função já está sendo usado',
         'label.required'=> 'Descrição da Função',
        ]);

        
        Role::create([
            'name'  =>  $this->name,
            'label'  =>  $this->label
        ]);

        return redirect()->route('roles');
    }

    public function render()
    {
        return view('livewire.acl.roles.role-create');
    }
}