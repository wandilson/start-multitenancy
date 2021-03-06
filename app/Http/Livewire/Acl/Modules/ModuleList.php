<?php

namespace App\Http\Livewire\Acl\Modules;

use App\Models\Acl\Modules\Module;
use Livewire\Component;
use Livewire\WithPagination;

class ModuleList extends Component
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
        $modules = Module::latest()->where('name', 'LIKE', "%{$this->search}%")
                        ->paginate($this->totalPages);
        
        return view('livewire.acl.modules.module-list', [
            'modules'     => $modules
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
        $item = Module::find($id);
        $item->delete();
    }
}