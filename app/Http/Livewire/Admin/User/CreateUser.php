<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\admin\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{

    public function render()
    {
        $roles  = Role::all();
        return view('livewire.admin.user.create-user', [
            'roles' => $roles,
        ]);
    }
    public $name,$email,$password,$role;
    public function resetinputs()
    {
         $this->name    = '';
         $this->email   = '';
         $this->password    = '';
         $this->role        = '';
    }
    protected $rules    = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'role'  => 'required',
    ];
    public function store ()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role'     => $this->role,
            'user_created_by'   => 'admin',
        ]);
        $this->resetinputs();
        session()->flash('message', 'User Created Successfully.');
    }
}
