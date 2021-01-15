<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserEdit extends Component
{
    public $user;
    public $name;
    public $last_name;
    public $email;
    public $password;
    public $password_confirmation;


    public function mount($id)
    {
        $this->user = User::find($id);        
        $this->name = $this->user['name'];
        $this->last_name = $this->user['last_name'];
        $this->email = $this->user['email'];
    }


    public function update()
    {
        $this->validate([
            'name' => 'required|min:6',
            'last_name' => 'required|min:6',
            'email' => 'required|email|unique:users,email,'.$this->user['id']
        ],
        [
         'name.required'=> 'Informe seu primeiro nome', // custom message
         'last_name.required'=> 'Informe seu sobrenome',
         'email.required'=> 'Informe seu e-mail',
         'email.unique'=> 'E-mail já esta sendo utilizado no sistema'
        ]);

        $this->user->update([
            'name'  =>  $this->name,
            'last_name'  =>  $this->last_name,
            'email'  =>  $this->email,
        ]);


        if($this->password)
            $this->updatePass();
            Auth::login($this->user); // Após atualizar a senha renova as credenciais

        return redirect()->route('users');
    }


    public function updatePass(){
        $this->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ],
        [
         'password.required'=> 'Informe sua senha de acesso',
         'password.confirmed'=> 'Sua senha não confere',
         'password_confirmation.required' => 'Você precisa confirmar a senha'
        ]);

        $this->user->update([
            'password'  =>  Hash::make($this->password)
        ]);
    }


    public function render()
    {
        return view('livewire.user.user-edit');
    }
}
