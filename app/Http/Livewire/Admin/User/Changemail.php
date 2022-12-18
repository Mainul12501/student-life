<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Changemail extends Component
{
    public function mount()
    {
        $this->auth_email   = Auth::user()->email;
    }
    public function render()
    {
        return view('livewire.admin.user.changemail');
    }
    public  $req_name,$req_email,$auth_email;
    public function resetinput()
    {
        $this->req_email        = '';
        $this->req_name        = '';
    }

    public function store()
    {
        $this->validate([
            'auth_email'    => 'required|email',
            'req_email'    => 'required|email'
        ]);
        $user   = User::findOrFail(Auth::id());
        $user->req_name         = $this->req_name;
        $user->req_email         = $this->req_email;
        $user->is_requested     = 1;
        $user->save();
        $this->resetinput();
        session()->flash('message', 'Your Request submitted Successfully. You can use this email after ADMIN approves your request.');
    }
}
