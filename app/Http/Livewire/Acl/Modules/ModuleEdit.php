<?php

namespace App\Http\Livewire\Acl\Modules;

use App\Models\Acl\Modules\Module;
use Livewire\Component;

class ModuleEdit extends Component
{
    public $modules;
    public $name;
    public $label;


    public function mount($id)
    {
        $this->modules = Module::find($id);        
        $this->name = $this->modules['name'];
        $this->label = $this->modules['label'];
    }


    public function update()
    {
        $this->validate([
            'label' => 'required|min:6',
            'name' => 'required|min:6|unique:modules,name,'.$this->modules['id']
        ],
        [
         'name.required'=> 'Informe o nome do Módulo',
         'name.unique'=> 'Esse nome de módulo já esta sendo usado',
         'label.required'=> 'Descrição do Módulo',
        ]);

        $this->modules->update([
            'name'  =>  $this->name,
            'label'  =>  $this->label
        ]);

        return redirect()->route('modules');
    }


    public function render()
    {
        return view('livewire.acl.modules.module-edit');
    }
}
