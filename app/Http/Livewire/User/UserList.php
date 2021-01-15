<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
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
        $users = User::latest()->where('name', 'LIKE', "%{$this->search}%")
                            ->paginate($this->totalPages);
        return view('livewire.user.user-list', [
            'users'     => $users
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
        $item = User::find($id);
        $item->delete();
    }
}