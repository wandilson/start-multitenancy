<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreate extends Component
{

    public $name;
    public $last_name;
    public $email;
    public $password;
    public $password_confirmation;
    public $msg_error_password;

    public function store()
    {
        
        $data = $this->validate([
            'name' => 'required|min:6',
            'last_name' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ],
        [
         'name.required'=> 'Informe seu primeiro nome', // custom message
         'last_name.required'=> 'Informe seu sobrenome',
         'email.required'=> 'Informe seu e-mail',
         'email.unique'=> 'E-mail já esta sendo utilizado no sistema',
         'password.required'=> 'Informe sua senha de acesso',
         'password.confirmed'=> 'Sua senha não confere',
         'password_confirmation.required' => 'Você precisa confirmar a senha'
        ]);

        
        User::create([
            'name'  =>  $this->name,
            'tenant_id'  =>  Auth()->user()->tenant_id,
            'last_name'  =>  $this->last_name,
            'email'  =>  $this->email,
            'password'  =>  Hash::make($this->password)
        ]);

        return redirect()->route('users');
    }

    public function render()
    {
        return view('livewire.user.user-create');
    }
}
