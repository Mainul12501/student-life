<?php

namespace App\Http\Livewire\Front\Usersuggestions;

use App\Models\front\UserSuggestion;
use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.front.usersuggestions.create');
    }
    public $name,$email,$phone,$text;
    public function store()
    {
        UserSuggestion::create([
            'name'  => $this->name,
            'phone'  => $this->phone,
            'email'  => $this->email,
            'text'  => $this->text,
        ]);
        $this->resetinput();
//        session()->flash('message', 'Your request saved. Thanks for contacting us.');
        $this->emit('livewireMessage', 'Your request saved. Thanks for contacting us.');
    }
    protected function resetinput()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->text = '';
    }
}
