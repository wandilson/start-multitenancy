<?php

namespace App\Http\Livewire\Acl\Modules;

use App\Models\Acl\Modules\Module;
use Livewire\Component;

class ModuleCreate extends Component
{

    public $name;
    public $label;

    public function store()
    {
        
        $this->validate([
            'name' => 'required|min:6|unique:modules',
            'label' => 'required|min:6',
        ],
        [
         'name.required'=> 'Informe o nome do Módulo',
         'name.unique'=> 'Esse nome de módulo já está sendo usado',
         'label.required'=> 'Descrição do Módulo',
        ]);

        
        Module::create([
            'name'  =>  $this->name,
            'label'  =>  $this->label
        ]);

        return redirect()->route('modules');
    }

    public function render()
    {
        return view('livewire.acl.modules.module-create');
    }
}